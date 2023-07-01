<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eeeeee;
        }

        button {
            appearance: none;
            background: #3535d3;
            color: #fff;
            border-radius: 5px;
            width: 150px;
            height: 30px;
            border: none;
            cursor: pointer;
        }

        button.danger {
            background: red;
        }

        button.cancel {
            background: #555;
        }

        input {
            appearance: none;
            border: none;
            width: 200px;
            height: 20px;
            border-radius: 5px;
            padding: 8px 16px;
            font-size: 15px;
            outline: none;
        }

        select {
            border: none;
            width: 150px;
            height: 35px;
            padding: 8px 14px;
            border-radius: 3px;
            outline: none;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .card {
            border: solid 1px #000000;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 350px;
            min-width: 300px;
            border-radius: 8px;
            padding: 5px;
            background-color: #ffffff;
        }

        .actions svg {
            cursor: pointer;
        }

        .modal {
            position: absolute;
            top: 0;
            left: 0;
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: rgba(0, 0, 0, 0.7);
            width: 100vw;
            height: 100vh;
        }

        .modal select {
            width: 100%;
        }

        .modal form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .modal-area {
            background-color: #fafafafa;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 25px;
            border-radius: 7px;
            box-shadow: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>

<body>
    <main class="container">
        <h1>Cadastro de Produto</h1>

        <div class="post-form">
            <form action="{{ route('empresa.cadastro_produto') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Digite o nome do seu produto">
                <input type="text" name="description" placeholder="Descrição">
                <input id="price" type="text" name="price" placeholder="Digite o preço" onchange="replaceComma()">
                <select name="is_active">
                    <option value=true selected>Disponível</option>
                    <option value=false>Indisponível</option>
                </select>
                <button type="submit" class="post-button">Cadastrar</button>
            </form>
        </div>
        <hr>
        <ul>
            @foreach ($products as $product)
                <li class='card'>
                    <h2>{{ $product->name }}</h2>
                    <p><strong>Descrição:</strong>{{ $product->description }}</p>
                    <p><strong>Preço:</strong>{{ $product->price }}</p>
                    <p style="gap: 10px;">
                        <strong>Status:</strong>{{ $product->is_active === 1 ? 'Disponível' : 'Indisponível' }}
                    </p>
                    <div class="actions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            onclick="openModal({{ $product->id }}, 'delete')">
                            <path fill="red"
                                d="M16 1.75V3h5.25a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1 0-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75Zm-6.5 0V3h5V1.75a.25.25 0 0 0-.25-.25h-4.5a.25.25 0 0 0-.25.25ZM4.997 6.178a.75.75 0 1 0-1.493.144L4.916 20.92a1.75 1.75 0 0 0 1.742 1.58h10.684a1.75 1.75 0 0 0 1.742-1.581l1.413-14.597a.75.75 0 0 0-1.494-.144l-1.412 14.596a.25.25 0 0 1-.249.226H6.658a.25.25 0 0 1-.249-.226L4.997 6.178Z" />
                            <path fill="red"
                                d="M9.206 7.501a.75.75 0 0 1 .793.705l.5 8.5A.75.75 0 1 1 9 16.794l-.5-8.5a.75.75 0 0 1 .705-.793Zm6.293.793A.75.75 0 1 0 14 8.206l-.5 8.5a.75.75 0 0 0 1.498.088l.5-8.5Z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            onclick="openModal({{ $product->id }}, 'edit')">
                            <path fill="blue"
                                d="m7 17.013l4.413-.015l9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583l-1.597 1.582l-1.586-1.585l1.594-1.58zM9 13.417l6.03-5.973l1.586 1.586l-6.029 5.971L9 15.006v-1.589z" />
                            <path fill="blue"
                                d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01c-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z" />
                        </svg>
                    </div>
                    <div class="modal" id="modal-edit-{{ $product->id }}">
                        <div class="modal-area">
                            <form action="{{ route('empresa.editar', $product) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" value="{{ $product->name }}">
                                <input type="text" name="description" value="{{ $product->description }}">
                                <input id="price" type="number" name="price" value="{{ $product->price }}" onchange="replaceComma()">
                                @if ($product->is_active === 1)
                                    <select name="is_active">
                                        <option value="true" selected>Disponível</option>
                                        <option value="false">Indisponível</option>
                                    </select>
                                @else
                                    <select name="is_active">
                                        <option value="true">Disponível</option>
                                        <option value="false" selected>Indisponível</option>
                                    </select>
                                @endif
                                <button type="submit">Editar</button>
                            </form>
                            <button class="cancel" onclick="closeModal({{ $product->id }}, 'edit')">Cancelar</button>
                        </div>
                    </div>
                    <div class="modal" id="modal-delete-{{ $product->id }}">
                        <div class="modal-area">
                            <form action="{{ route('empresa.deletar', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <h2 class="delete">Você tem certeza que deseja deletar o produto?</h2>
                                <button class="danger" type="submit">Deletar</button>
                            </form>
                            <button class="cancel"
                                onclick="closeModal({{ $product->id }}, 'delete')">Cancelar</button>
                        </div>
                    </div>
                </li>
            @endforeach
            @if (count($products) === 0 || $products === null)
                <li class="post-item">Nenhum produto registrado.</li>
            @endif
        </ul>
    </main>
</body>
<script>
    function openModal(id, modal) {
        document.querySelector(`#modal-${modal}-${id}`).style.display = 'flex'
    }

    function closeModal(id, modal) {
        document.querySelector(`#modal-${modal}-${id}`).style.display = 'none'
    }

    function replaceComma() {
        let price = document.querySelector('#price').value
        document.querySelector('#price').value = parseFloat(String(price).replace(',', '.')).toFixed(2)
    }
</script>

</html>
