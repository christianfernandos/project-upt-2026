<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kalkulator extends Model
{
    use HasFactory;
    protected $table = 'kalkulator';
    protected $guarded = [];

    public function getTotalOmzetAttribute(): float
    {
        $total = 0;
        for ($i = 1; $i <= 2; $i++) {
            $total += (float) ($this->{"omzet_{$i}"} ?? 0);
        }
        return $total;
    }

    public function getProduktivitasPerTkAttribute(): float
    {
        if ($this->tenaga_kerja <= 0) return 0;
        return $this->total_omzet / $this->tenaga_kerja;
    }

    public function getRekomendasiTkAttribute(): int
    {
        $target = 150000000;
        if ($this->total_omzet <= 0) return 0;
        return (int) ceil($this->total_omzet / $target);
    }
}
