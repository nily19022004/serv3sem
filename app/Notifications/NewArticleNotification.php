<?php

namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewArticleNotification extends Notification
{
    use Queueable;

    public function __construct(public Article $article)
    {
    }

    // Настраиваем канал (только база данных)
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    // Переименовываем метод и возвращаем массив данных
    public function toDatabase(object $notifiable): array
    {
        return [
            'article_id' => $this->article->id,
            'title' => $this->article->title,
            'message' => 'Опубликована новая статья: ' . $this->article->title,
        ];
    }
}