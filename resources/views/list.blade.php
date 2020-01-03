<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax TODO</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Ajax ToDo<a href="#" class="pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" id="addnew" aria-hidden="true"></i></a></h3>
				  </div>
				  <div class="panel-body" id="items">
				    <ul class="list-group">
				     @foreach ($items as $item)
				      <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">{{$item->item}}</li>
				     @endforeach
				    </ul>
				  </div>
				</div>
			</div>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="title">MyToDo</h4>
			      </div>
			      <div class="modal-body">
			        <input type="text" name="" class="form-control" placeholder="add  input" id="addItem">
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" id="delete" data-dismiss="modal" style="display: none;">Delete</button>
			        <button type="button" class="btn btn-primary" id="savechange" style="display: none;">Save changes</button>
			        <button type="button" class="btn btn-primary" id="addButton" data-dismiss="modal">Add Item</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</div>
	</div>
	@csrf
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script type="text/javascript">
  	jQuery(document).ready(function($) {
  		// $('.ourItem').each(function() {
  		// 	$(this).click(function(event) {
  		// 		var text = $(this).text();
  		// 		$('#title').text('you want edit');
  		// 		$('#addItem').val(text);
  		// 		$('#delete').show('400');
  		// 		$('#savechange').show('400');
  		// 		$('#addButton').hide('400');
  		// 	});
  		// });

//you can use below jquery instead of "each function"
  		$(document).on('click','.ourItem',function(event) {
  			var text = $(this).text();
  			$('#title').text('you want edit');
  			$('#addItem').val(text);
  			$('#delete').show('400');
  			$('#savechange').show('400');
  			$('#addButton').hide('400');
  		});
  		$(document).on('click','#addnew',function(event) {
  			$('#title').text('you wants add');
  			$('#addItem').val('');
  			$('#delete').hide('400');
  			$('#savechange').hide('400');
  			$('#addButton').show('400');
  		});

  		$('#addButton').click(function(){
  			var text = $('#addItem').val();
  			$.post('list', {'text': text,'_token':$('input[name=_token]').val()}, function(data) {
  				console.log(data);
  				$('#items').load(location.href + ' #items')
  			});
  		});
  	});
  </script>
</body>
</html>