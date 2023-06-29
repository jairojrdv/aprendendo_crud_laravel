<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <style>
        body {
          font-family: Arial, sans-serif;
        }
      
        .container {
          text-align: center;
          max-width: 600px;
          margin: 0 auto;
          padding: 20px;
          justify-content: center;
          align-items: center;
          height: 100vh;
        }
      
        h1 {
          text-align: center;
        }
    </style>
</head>
<body>
<main class='container'>
<h1>Gerenciador de Tarefas</h1>

<div>
    <form action= {{ route('manager.store') }} method="POST">
        @csrf
        <label for="task-title">Adicione aqui sua tarefa:</label>
        <input type="text" id="task-title" name="title" placeholder="Título">
        <br>
        @csrf
        <label for="task-description">Descrição:</label>
        <input type="text" id="task-description" name="description" placeholder="Descrição">
        <br>
        <button type="submit">Adicionar Tarefa</button>
    </form>
</div>


<ul id="task-list">
    {{-- @foreach ($tasks as $task)
        <li>
            <h3>{{ $task['title'] }}</h3>
            <p>{{ $task['description'] }}</p>
            <p>Status: {{ $task['completed'] ? 'Concluído' : 'A fazer' }}</p>
            <form action="{{ route('update', $task) }}" method="POST" >
                @csrf
                @method('PUT')
                <input type="text" name="name" value="{{ $task->title }}">
                <button type="submit">Editar</button>
              </form>
            <form action="{{ route('destroy', $task) }}" method="POST" >
                @csrf
                @method('DELETE')
                <button type="submit">Deletar</button>
            </form>
        </li>
    @endforeach --}}
    <ul>
        @foreach($tasks as $task)
          <li>
            <h2><strong>Título da Tarefa:</strong></h2> <h3>{{ $task->title }}</h3>
            <hr>
            <p><strong>Descrição:</strong>{{ $task->description }}</p>
            <div>
            <form action="{{ route('manager.update', $task) }}" method="POST" >
                @csrf
                @method('PUT')
                <input type="text" name="title" value="{{ $task->title }}">
                <input type="text" name="description" value="{{ $task->description }}">
                <button type="submit">Editar</button>
                </form>
                <p style="gap: 10px;">Status: {{ $task['completed'] ? 'Concluído' : 'A fazer' }}</p>
                <form action="{{ route('manager.destroy', $task) }}" method="POST" >
                  @csrf
                  @method('DELETE')
                  <button type="submit">Deletar</button>
                </form>
            </div>
          </li>
        @endforeach
        @if(count($tasks) === 0 || $tasks === null)
            <li class="post-item">Nenhuma tarefa registrada.</li>
        @endif
  </ul>
</ul>
</main>
</body>
</html>