<div class="text-center p-2 col-md-12 text-white bg-primary border-top">
	<h3>HR MANAGER EVALUATION</h3>
</div>

<div class="row">
	<div class="col-7 p-2 bg-secondary text-white text-center">
		<p class="mt-0 mb-0">Criteria</p>
	</div>
	<div class="col-1 p-2 bg-secondary text-white text-center">
		<p class="mt-0 mb-0">Excellent</p>
	</div>
	<div class="col-1 p-2 bg-secondary text-white text-center">
		<p class="mt-0 mb-0">Good</p>
	</div>
	<div class="col-1 p-2 bg-secondary text-white text-center">
		<p class="mt-0 mb-0">Satisfactory</p>
	</div>
	<div class="col-1 p-2 bg-secondary text-white text-center">
		<p class="mt-0 mb-0">Fair</p>
	</div>
	<div class="col-1 p-2 bg-secondary text-white text-center">
		<p class="mt-0 mb-0">Poor</p>
	</div>
</div>


@foreach($questions as $key => $question)
	@if($question->type_id == "4")
		@if($question->type == "radio")
		<?php
			$options = json_decode($question->options);
		?>
			<div class="row border border-default">
				<div class="col-7 p-2 text-left">
					<p class="mt-0 mb-0 pl-3">{{$question->question}}</p>
				</div>
				@foreach($options as $key1 => $option)
					<div class="col-1 p-2 text-center">
						<p class="mt-0 mb-0">
							<label class="checkboxRadio">
								<input value="<?= $key1+1 ?>" name="<?= $question->id?>" type="radio"  />
								<span class="primary"></span>
							</label>
						</p>
					</div>
				@endforeach
			</div>
		@else
		<div class="col-12 p-2 bg-secondary text-white">
			<p class="mt-0 mb-0">{{$question->question}}</p>
		</div>
		<textarea name="<?= $question->id?>" rows="10" class="form-control" placeholder="Start typing here..."></textarea>
		@endif
	@endif
@endforeach