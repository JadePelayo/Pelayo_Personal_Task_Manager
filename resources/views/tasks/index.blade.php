<!DOCTYPE html>
<html>
<head>
    <title>Task Board</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f7f5;
            color: #333;
        }

        .header {
            background-color: #2e7d32;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
        }

        .add-button {
            background-color: white;
            color: #2e7d32;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 30px auto;
        }

        .summary {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }

        .box {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            flex: 1;
            text-align: center;
            box-shadow: 0 2px 6px #ddd;
        }

        .box h2 {
            margin: 5px 0;
            color: #2e7d32;
        }

        .task {
            background-color: white;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 6px #ddd;
        }

        .task h3 {
            margin-top: 0;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            background-color: #e8f5e9;
            color: #2e7d32;
            font-size: 14px;
        }

        .actions {
            margin-top: 15px;
        }

        .edit {
            color: #2e7d32;
            margin-right: 15px;
            text-decoration: none;
        }

        .delete {
            background-color: #d32f2f;
            color: white;
            border: none;
            padding: 7px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .empty {
            background-color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Task Board</h1>

        <a href="/tasks/create" class="add-button">
            + New Task
        </a>
    </div>

    <div class="container">

        <div class="summary">

            <div class="box">
                <p>Total Tasks</p>
                <h2>{{ $tasks->count() }}</h2>
            </div>

            <div class="box">
                <p>Pending</p>
                <h2>{{ $tasks->where('status', 'Pending')->count() }}</h2>
            </div>

            <div class="box">
                <p>Completed</p>
                <h2>{{ $tasks->where('status', 'Completed')->count() }}</h2>
            </div>

        </div>

        @if($tasks->count() > 0)

            @foreach($tasks as $task)

                <div class="task">

                    <h3>{{ $task->task_name }}</h3>

                    <p>{{ $task->description }}</p>

                    <span class="status">
                        {{ $task->status }}
                    </span>

                    <p>
                        <strong>Due:</strong>
                        {{ $task->due_date ?? 'No due date' }}
                    </p>

                    <div class="actions">

                        <a href="/tasks/{{ $task->id }}/edit" class="edit">
                            Edit Task
                        </a>

                        <form action="/tasks/{{ $task->id }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete">
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        @else

            <div class="empty">
                <h3>No tasks yet</h3>
                <p>Click "+ New Task" to create your first task.</p>
            </div>

        @endif

    </div>

</body>
</html>