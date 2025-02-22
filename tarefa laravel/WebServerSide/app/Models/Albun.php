<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Banda;

class Albun extends Model
{
    use HasFactory;

    // Nome da tabela (opcional, se o nome da tabela for diferente do padrão)
    protected $table = 'albuns';

    // Campos que podem ser preenchidos em massa (Mass Assignment)
    protected $fillable = [
        'name',
        'date',
        'id_banda', // Cria uma banda automaticamente,
    ];

    // Relacionamento com a tabela `bandas` (se houver)
    public function banda()
    {
        return $this->belongsTo(Banda::class);
    }
}
