$(document).ready(function() {
	let qid = $(".q").attr("id");
	let answerIndex = $("input[name='answer']:checked").val();
	// console.log(answerIndex);
	let answers = [];
	$.ajax({
		type: "GET",
		url:
			"/SurveyManagement/cakephp/questions/getNextQuestion/" +
			qid +
			"/" +
			answerIndex,
		// data: {id: qid},
		success: function(nextQ) {
			if (nextQ.length != 0) {
				// $("form").append('<button type="button" id="prv">Previous</button>');
				// console.log(nextQ);

				$("#fset").append(
					'<button type="button" class="btn btn-primary btn-lg" style="margin: 10px;" id="nxt">Next</button>'
				);
				$("#nxt").click(() => {
					answers.push({
						qid: $(".q").attr("id"),
						answer: $("input[name='answer']:checked").val() == 0 ? "y" : "n",
						notes: $(".note").val()
					});

					$.ajax({
						type: "GET",
						url:
							"/SurveyManagement/cakephp/questions/getNextQuestion/" +
							$(".q").attr("id") +
							"/" +
							$("input[name='answer']:checked").val(),
						success: function(response) {
							if (response.length != 0) {
								// alert(response);
								response = JSON.parse(response);
								$(".q").attr("id", response.id);
								$(".q").val(response.question);
								$(".note").val("");
							} else {
								//last question
								// alert("last one!");
								$("#nxt")
									.attr("id", "submit")
									.off("click")
									.text("Submit")
									.click(function() {
										// console.log(answers)
										answers.forEach(function(ans) {
											$.ajax({
												type: "POST",
												url: "/SurveyManagement/cakephp/answers/add",
												dataType: "json",
												data: ans,
												success: function(response) {
													// console.log("answers", answers);
													// console.log("resp", response);
												}
											});
										});
										window.location = "/SurveyManagement/cakephp/surveys";
									});
							}
						}
					});
				});
			} else {
				//this is the only question
				$("#fset").append(
					'<button type="button" class="btn btn-primary btn-lg" style="margin: 10px;" id="submit">Submit</button>'
				);
				$("#submit").click(function() {
					// console.log(answers)
					$.ajax({
						type: "POST",
						url: "/SurveyManagement/cakephp/answers/add",
						dataType: "json",
						data: {
							qid: $(".q").attr("id"),
							answer: $("input[name='answer']:checked").val() == 0 ? "y" : "n",
							notes: $(".note").val()
						},
						success: function(response) {
							// console.log("answers", answers);
							// console.log("resp", response);
						}
					});
					window.location = "/SurveyManagement/cakephp/surveys";
				});
			}
		}
	});

	// $("#submit").click(function() {});
});
