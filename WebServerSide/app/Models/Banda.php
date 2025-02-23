<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banda extends Model
{
    use HasFactory;

    // Nome da tabela (opcional, se o nome da tabela for diferente do padrão)
    protected $table = 'bandas';

    // Campos que podem ser preenchidos em massa (Mass Assignment)
    protected $fillable = [
        'name',
        'quant_albuns',
    ];

    // Relacionamento com a tabela `albuns` (se houver)
    public function albuns()
    {
        return $this->hasMany(Album::class);
    }
}
