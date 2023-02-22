<?php

namespace App\Events;

use App\Models\Comments;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StrickOneEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $comment;
    public function __construct($comment)
    {
        $this->comment=$comment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //dd($this->comment);
        return new Channel('strike-one-'.$this->comment->idea_id);
    }

    public function broadcastWith(){
        $text=strtoupper(substr($this->comment->user->name,0,2));
        return ['comment' => $this->comment, 'name' => $this->comment->user->name,'img_text'=> $text,'date'=>date('d M Y',strtotime($this->comment->created_at))];
    }
}
