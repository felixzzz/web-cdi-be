<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SymlinkPageManagement extends Command
{
    protected $signature = 'app:symlink-page-management';
    protected $description = 'Buat symlink dari storage/app/private/page-management ke public/page-management';

    public function handle()
    {
        $target = storage_path('app/private/page-management');
        $link = public_path('page-management');

        // Cek apakah folder target ada
        if (!is_dir($target)) {
            $this->error("Folder target tidak ditemukan: $target");
            return Command::FAILURE;
        }

        // Cek apakah sudah ada
        if (file_exists($link)) {
            if (is_link($link)) {
                $this->info("Symlink sudah ada: $link");
            } else {
                $this->error("Folder/file sudah ada di lokasi: $link (bukan symlink)");
            }
            return Command::SUCCESS;
        }

        // Buat symlink
        symlink($target, $link);
        $this->info("✅ Symlink berhasil dibuat:");
        $this->line("  dari → $target");
        $this->line("  ke   → $link");

        return Command::SUCCESS;
    }
}
