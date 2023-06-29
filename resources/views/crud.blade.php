<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD VENCEDOR</title>
    <style>
        body {
          font-family: Arial, sans-serif;
        }
      
        .container {
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
      
        .post-form {
          margin-bottom: 20px;
          display: flex;
          justify-content: center;
          align-items: center;
        }
      
        .post-form input[type="text"] {
          width: 100%;
          padding: 10px;
          font-size: 16px;
          border-radius: 4px;
          border: 1px solid #ccc;
          text-align: center; 
        }
      
        .post-list {
          list-style-type: none;
          padding: 0;
        }
      
        .post-item {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: 10px;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 4px;
        }
      
        .post-item .actions {
          display: flex;
          gap: 5px;
        }
      
        .post-item .actions button {
          padding: 5px 10px;
          font-size: 14px;
          border-radius: 4px;
          border: none;
          cursor: pointer;
          background-color: #007bff;
          color: #fff;
        }
        .post-button {
        display: block;
        margin: 0 auto;
        margin-top: 10px;
        margin-bottom: 18px;
        align-items: center;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        border: none;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        }

        .post-button:hover {
        background-color: #0056b3;
}
    </style>
</head>
<body>
    <main class="container">
        <h1>Tela de Postagem</h1>
      
        <div class="post-form">
          <form action="{{ route('group.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Digite sua postagem">
            <button type="submit" class="post-button">Postar</button>
          </form>
        </div>

        <ul class="post-list">
              @foreach($posts as $post)
                <li class="post-item">
                  {{ $post->name }}
                  <div class="actions">
                    <form action="{{ route('group.destroy', $post) }}" method="POST" >
                      @csrf
                      @method('DELETE')
                      <button type="submit">Deletar</button>
                    </form>
                    <hr>
                    <form action="{{ route('update', $post) }}" method="POST" >
                      @csrf
                      @method('PUT')
                      <input type="text" name="name" value="{{ $post->name }}">
                      <button type="submit">Editar</button>
                    </form>
                  </div>
                </li>
              @endforeach
              @if(count($posts) === 0 || $posts === null)
                  <li class="post-item">Nenhuma postagem encontrada.</li>
              @endif
        </ul>
      </main>
</body>
</html>
