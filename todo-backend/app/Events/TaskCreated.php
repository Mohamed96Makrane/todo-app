<?php

namespace App\Events;

use App\Models\Task;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TaskCreated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    // Canal sur lequel l'événement sera diffusé
    public function broadcastOn()
    {
        return new Channel('tasks.' . $this->task->user_id);
    }

    public function broadcastAs()
    {
        return 'task.created';
    }
}
