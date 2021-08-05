<!DOCTYPE html>
<html>
<head>
	<title>Quiz App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="home-box custom-box">
		<h3>Introduction : </h3>
		<p>Nombre de question total : <span class="total-question"></span></p>
		<button type="button" class="btn" onclick="startQuiz()">COMMENCER</button>
	</div>

	<div class="quiz-box custom-box hide">
		<div class="question-number">
			
		</div>
		<div class="question-text">

		</div>
		<div class="option-container">

		</div>
		<div class="next--question-btn">
			<button type="button" class="btn" onclick="next()">Suivant</button>
		</div>
		<div class="answers-indicator">

		</div>

	</div>
	<div class="result-box custom-box hide">
		<h1>Resultat</h1>
		<table>
			<tr>
				<td>Total Question</td>
				<td><span class="total-question"></span></td>
			</tr>
			<tr>
				<td>Bonne Réponse</td>
				<td><span class="total-correct"></span></td>
			</tr>
			<tr>
				<td>Mauvaise réponse</td>
				<td><span class="total-wrong"></span></td>
			</tr>
			<tr>
				<td>Pourcentage</td>
				<td><span class="percentage"></span></td>
			</tr>
			<tr>
				<td>Scrore total</td>
				<td><span class="total-score"></span></td>
			</tr>
		</table>
		<input class="btn"  type='button' value='Retour' onclick="window.location.href='../../concours.php'"/>

	</div>



	<script src="js/question.js"></script>
	<script src="js/app.js"></script>
</body>
</html>


