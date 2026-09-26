<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>

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
        }

        .header h1 {
            margin: 0;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 35px auto;
        }

        .form-card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 6px #ddd;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 7px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        .update-button {
            background-color: #2e7d32;
            color: white;
            border: none;
            padding: 11px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .back-button {
            color: #2e7d32;
            text-decoration: none;
            margin-left: 15px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Edit Task</h1>
    </div>

    <div class="container">

        <div class="form-card">

            <form action="/tasks/{{ $task->id }}" method="POST">

                @csrf
                @method('PUT')

                <label>Task Name</label>
                <input
                    type="text"
                    name="task_name"
                    value="{{ $task->task_name }}"
                    required
                >

                <label>Description</label>
                <textarea name="description">{{ $task->description }}</textarea>

                <label>Status</label>
                <select name="status">

                    <option value="Pending"
                        {{ $task->status == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed"
                        {{ $task->status == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>

                <label>Due Date</label>
                <input
                    type="date"
                    name="due_date"
                    value="{{ $task->due_date }}"
                >

                <button type="submit" class="update-button">
                    Update Task
                </button>

                <a href="/tasks" class="back-button">
                    Back to Task Board
                </a>

            </form>

        </div>

    </div>

</body>
</html>