@layout("rf::home")

@section("rf_content")

{{\Bootstrapper\Breadcrumbs::create(array('RF' => URL::to('rf'), 'Ardoises'))}}

<h2>Liste des utilisateurs poss&eacute;dant une ardoise</h2>
<div class="well">
	<div class="btn-group">
	  <a class="btn" href="pdf/ardoises">
	    Télécharger la liste des ardoises
	  </a>
	</div>
	<div class="btn-group">
	  <a class="btn btn-primary" href="pdf/ardoises_negatives">
	    Télécharger la liste des ardoises négatives
		</a>
	</div>
</div>
<div class="well">
	<h3>Balance des ardoises</h3>
	<ul class="stats-tabs">
		<li>{{Ardoise::sum('montant')}} € <small>total</small></li>
		<li>{{Ardoise::where('montant', '>', '0')->sum('montant')}} € <small>positives</small></li>
		<li>{{Ardoise::where('montant', '<', '0')->sum('montant')}} € <small>négatives</small></li>
	</ul>
</div>
<p>
<table class="table table-bordered dt-table">
	<thead>
		<tr><th>Login</th><th>Nom complet</th><th>Ardoise</th><th>Courriel</th></tr>
	</thead>
	<tbody>
		@foreach($utilisateurs as $item)
			<tr>
				<td>{{HTML::link_to_action('rf::ardoises@edit', $item->login, array($item->id))}}</td>
				<td>{{$item->prenom}} {{$item->nom}}</td>
				<td>{{$item->montant}}</td>
				<td>{{$item->mail}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
</p>
@endsection