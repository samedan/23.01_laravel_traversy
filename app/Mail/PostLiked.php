<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostLiked extends Mailable
{
    use Queueable, SerializesModels;

    public $likerOfPost;
    public $post;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $likerOfPost, Post $post)
    {
        $this->likerOfPost = $likerOfPost;
        $this->post = $post;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Someone liked your post',
            with: [
                $url => route('posts.show', $post)
            ]
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */

    public function content()
    {
        return new Content(
            markdown: 'emails.posts.post_liked'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
