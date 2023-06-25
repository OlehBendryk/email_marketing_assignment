<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class EmailMassSending extends Model
{
    use HasFactory;


    protected $table = 'email_sendings';

    protected $fillable = [
        'email_template_id',
        'group_id',
        'sent_to',
        'status',
    ];

    protected $casts = [
        'sent_to' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function groups(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function email_templates(): BelongsTo
    {
        return $this->belongsTo(EmailTemplate::class, 'email_template_id', 'id');
    }
}
