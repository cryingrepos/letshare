<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Comments;

class ArenaEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
     public $comment;
     public $date;
     public $url;
     public $type;
    public function __construct($comment,$type)
    {
        $this->comment=Comments::with('user')->where('id',$comment->id)->first();
        $this->type=$type;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('arena_comment-'.$this->comment->idea_id);
    }
    
    public function broadcastWith(){
        $this->url='https://thetestingserver.com/avrt/public/arena/delete?reply='.$this->comment->id;
        $this->date=date('d M Y H:i',strtotime($this->comment->created_at));
        return ['comment'=>$this->comment,'url'=>$this->url,'date'=>$this->date,'type'=>$this->type,'img_text'=>strtoupper(substr($this->comment->user->name,0,2))];
    }
}
