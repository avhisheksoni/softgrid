<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>
    <h1>Total Users : {{count($users)}}</h1>

    <h1>Apis Count</h1>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Api Name</th>
				<th>Count</th>
			</tr>
		</thead>
		<tbody>
			@foreach($requestApis as $key => $val)
			<tr>
				<td>{{++$key}}</td>
				<td>{{$val->api_name}}</td>
				<td>{{$val->cont}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<h1>User Wise Apis Count</h1>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Api Name</th>
				<th>User Name</th>
				<th>Count</th>
			</tr>
		</thead>
		<tbody>
			@foreach($apisName as $api)
				@foreach($users as $user)
					<tr>
						<td></td>
						<td>{{$api->api_name}}</td>
						<td>{{$user->name}}</td>
						<td>{{collect($user->request_apis)->where('api_name',$api->api_name)->count()}}</td>
					</tr>
				@endforeach
			@endforeach
		</tbody>
	</table>

	<h1>User Wise Apis History</h1>
	<input type="date" id ="date" value="{{date('Y-m-d')}}">
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Api Name</th>
				<th>User Name</th>
				<th>Date Time</th>
			</tr>
		</thead>
		<tbody id="tbody">
				
		</tbody>
	</table>
</table>
</body>
<script>
	$(document).ready(function(){
		var date =  $('#date').val();;
		filter(date);
		$('#date').on('change',function(e){
			e.preventDefault();
			var date = $(this).val();
			filter(date)
		})
		function filter(date){
			$.ajax({
				url:"{{url('request-api-filter')}}/"+date,
				method:"Get",
				success:function(res){
					$('#tbody').empty();
					$.each(res,function(i,v){
						$('#tbody').append('<tr><td>'+v.id+'</td> <td>'+v.api_name+'</td><td>'+v.user.name+'</td><td>'+v.date_time+'</td></tr>');
					})
				}
			})
		}
	});
</script>
</html>