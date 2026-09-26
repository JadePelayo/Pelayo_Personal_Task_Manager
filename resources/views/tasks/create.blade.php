<!DOCTYPE html>
<html>
<head>
    <title>New Task</title>

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

        .save-button {
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
        <h1>New Task</h1>
    </div>

    <div class="container">

        <div class="form-card">

            <form action="/tasks" method="POST">
                @csrf

                <label>Task Name</label>
                <input type="text" name="task_name" placeholder="Enter task name" required>

                <label>Description</label>
                <textarea name="description" placeholder="Enter task description"></textarea>

                <label>Status</label>
                <select name="status">
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>

                <label>Due Date</label>
                <input type="date" name="due_date">

                <button type="submit" class="save-button">
                    Save Task
                </button>

                <a href="/tasks" class="back-button">
                    Back to Task Board
                </a>

            </form>

        </div>

    </div>

</body>
</html>