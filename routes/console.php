<?php

use App\Models\Brochure;
use App\Models\Program;
use App\Models\Setting;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Command\Command;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('storage:migrate-public-to-s3 {--delete-local : Delete local files after successful upload}', function () {
    $localDisk = Storage::disk('public');
    $s3Disk = Storage::disk('s3');

    $paths = collect([
        Setting::get('site_logo'),
        Setting::get('hero_image'),
        Setting::get('hero_video_thumbnail'),
    ])
        ->merge(Program::whereNotNull('image')->pluck('image'))
        ->merge(Brochure::whereNotNull('image')->pluck('image'))
        ->filter()
        ->unique()
        ->values();

    if ($paths->isEmpty()) {
        $this->info('Tidak ada path gambar di database.');
        return Command::SUCCESS;
    }

    foreach ($paths as $path) {
        if ($s3Disk->exists($path)) {
            $this->line("SKIP {$path} sudah ada di S3/MinIO.");
            continue;
        }

        if (! $localDisk->exists($path)) {
            $this->warn("MISS {$path} tidak ditemukan di local public disk.");
            continue;
        }

        $stream = $localDisk->readStream($path);
        $s3Disk->put($path, $stream);

        if (is_resource($stream)) {
            fclose($stream);
        }

        $this->info("OK {$path} -> S3/MinIO");

        if ($this->option('delete-local')) {
            $localDisk->delete($path);
            $this->line("DEL local {$path}");
        }
    }

    $this->info('Migrasi gambar selesai.');
    return Command::SUCCESS;
})->purpose('Migrate referenced local public images to S3/MinIO');
