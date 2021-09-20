<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/index.css')}}">
  <title>COACHTECH</title>
</head>
<body>
  <div class="background-body">
    <div class="todo-list">
      <h1 class="todo-list__title">Todo List</h1>
      @if (count($errors) > 0)
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      @endif
      <form action="/todo/create" class="form__create" method="POST">
        @csrf
        <input type="text" name="content" class="input__textbox textbox__create">
        <button class="form__button button__create">追加</button>
      </form>
      <table>
        <tr class="form__update__label">
          <th class="form__update__data-hidden"></th>
          <th class="form__update__data-displayed">作成日</th>
          <th class="form__update__data-displayed">タスク名</th>
          <th class="form__update__data-displayed">更新</th>
          <th class="form__update__data-displayed">削除</th>
        </tr>
        @foreach ($items as $item)
          <tr class="form__update__item">
          <form action="/todo/update" method="POST">
            @csrf
            <td class="form__update__data-hidden"><input type="hidden" name="id" value="{{$item->id}}"></td>
            <td class="form__update__data-displayed">
              {{$item->created_at}}
            </td>
            <td class="form__update__data-displayed">
              <input type="text" name="content" class="input__textbox textbox__update" value="{{$item->content}}">
            </td>
            <td class="form__update__data-displayed">
              <button class="form__button button__update">更新</button>
            </td>
            <td class="form__update__data-displayed">
              <button class="form__button button__delete" formaction ="/todo/delete">削除</button>
            </td>
          </form>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</body>
</html>