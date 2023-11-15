<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Курсы.ru</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<style>
		a>img {
			width: 30px;
		}
	</style>
</head>

<body>
	<x-admin.header />
	<main>
		<section>
			<div class="container">
				<h2 class="m-3">Список заявок</h2>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Email</th>
							<th scope="col">Имя клиента</th>
							<th scope="col">Курс</th>
							<th scope="col">Дата заявки</th>
							<th scope="col">Статус заявки</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($applications as $item)
						<tr>
							<th score="row{{$item->id}}"></th>
							<td>{{$item->email}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->course_id}}</td>
							<td>{{$item->created_at}}</td>
							<td>@if ($item->is_confirm === 1)
								{{'Подтверждена'}}
								@else
								{{'Не подтверждена'}}
								@endif
							</td>
							<td>
								<a href="application/{{$item->id}}/confirm">
									<img src="/images/free-icon-check-1828640.png" alt="Подтвердить">
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</section>
		<section id="enroll">
			<div class="container">
				<form class="w-50 my-0 mx-auto" action="/cours" method="POST" enctype="multipart/form-data">
					@csrf
					<h2 class="m-3">Создание курса</h2>
					<div class="mb-3">
						<label for="title" class="form-label">Название курса:</label>
						<input type="text" class="form-control" id="title" name="title">
						@error('title')
						<div class="alert alert-danger mt-1" role="alert">
						{{$message}}
						</div>
						@enderror
					</div>
					<div class="mb-3">
						<label for="description" class="form-label">Описание курса:</label>
						<input type="text" class="form-control" id="description" name="description">
						@error('description')
						<div class="alert alert-danger mt-1" role="alert">
						{{$message}}
						</div>
						@enderror
					</div>
					<div class="mb-3">
						<label for="cost" class="form-label">Цена:</label>
						<input type="number" class="form-control" id="cost" name="cost">
						@error('cost')
						<div class="alert alert-danger mt-1" role="alert">
						{{$message}}
						</div>
						@enderror
					</div>
					<div class="mb-3">
						<label for="duration" class="form-label">Продолжительность(в неделях):</label>
						<input type="number" class="form-control" id="duration" name="duration">
						@error('duration')
						<div class="alert alert-danger mt-1" role="alert">
						{{$message}}
						</div>
						@enderror
					</div>
					<div class="mb-3">
						<label for="image" class="form-label">Изображение курса:</label>
						<input type="file" class="form-control" id="image" name="image">
					</div>
					<div class="m-3">
						<label for="name" class="form-label">Выберете категорию курса</label>
						<select class="form-select" name="category">
							@foreach($categories as $item)
							<option value="{{$item->id}}">{{$item->title}}</option>
							@endforeach
						</select>
						@error('category')
						<div class="alert alert-danger mt-1" role="alert">
						{{$message}}
						</div>
						@enderror
						<br>
				<button type="submit" class="btn btn-primary">Создать курс</button>
				</form>
			</div>
		</section>
		<section id="enroll">
			<div class="container">
				<form class="w-50 my-0 mx-auto" action="/category" method="POST">
					@csrf
					<h2 class="m-3">Создание категории курса</h2>
					<div class="mb-3">
						<label for="title-course" class="form-label">Название категории курса:</label>
						<input type="text" class="form-control" id="title-course" name="title-course">
						@error('title-course')
						<div class="alert alert-danger mt-1" role="alert">
						{{$message}}
						</div>
						@enderror
						<br>
				<button type="submit" class="btn btn-primary">Создать категорию</button>
				</form>
			</div>
		</section>
	</main>
</body>

</html>