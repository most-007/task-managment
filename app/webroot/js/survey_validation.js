$(document).ready(function() {
	// alert('test!');

		$(".navbar").hide();

	//title validation
	$("#title").blur(() => {
		$.post(
			"/SurveyManagement/cakephp/surveys/validateForm",
			{ field: $("#title").attr("id"), value: $("#title").val() },
			validateTitle
		);
	});

	let questions = {
		question: "What's your first question?",
		id: 1,
		children: []
	};
	let clickedQId;
	let maxQId = 1;
	renderTree(questions);

	initQuestionsEvents();

	$("#save-q").click(function() {
		if ($("#qtext").val() === "") {
			alert("Please fill in the question text!");
			return;
		}
		$(".qform").hide();
		var qtext = $("#qtext").val(),
			yq = $("#yq").val(),
			nq = $("#nq").val();
		// alert(clickedQId);
		updateQuestionById(clickedQId, qtext, yq, nq, questions);
		// console.log(questions);

		renderTree(questions);
		initQuestionsEvents();
	});

	$("#qform-close").click(function() {
		$(".qform").hide();
	});

	$("#submit").click(() => {
		// alert($("#title").val())
		if ($("#title").val().length >= 3) {
			$.post(
				"/SurveyManagement/cakephp/surveys/add",
				{ title: $("#title").val(), questions },
				data => {
					// alert(JSON.parse(data).survey_id);
					window.location =
						"/SurveyManagement/cakephp/surveys" //+ JSON.parse(data).survey_id;
				}
			);

			// $.ajax({url: "/SurveyManagement/cakephp/surveys/addSurvey", success: function(result){
			// 	window.location = "/SurveyManagement/cakephp/surveys";
			//   }});
		}
		else {
			$.post(
				"/SurveyManagement/cakephp/surveys/validateForm",
				{ field: $("#title").attr("id"), value: $("#title").val() },
				validateTitle
			);
		}
	});

	function renderTree(questions) {
		$("#questions").hortree({
			data: [questions]
		});
	}

	function validateTitle(error) {
		if (error.length > 0) {
			if ($("#title-not-empty").length == 0) {
				$("#title").after(
					'<div id="title-not-empty" class="error-message">' + error + "<div>"
				);
			}
		} else {
			$("#title-not-empty").remove();
		}
	}

	function initQuestionsEvents() {
		//add/edit question form
		$(".q").click(function() {
			clickedQId = $(this).attr("id");
			// console.log(clickedQId);
			var clickedQ = getQuestionById(clickedQId, questions);
			var yesQ = "",
				noQ = "";
			var firstChild = clickedQ.children[0];
			var secondChild = clickedQ.children[1];
			// console.log(firstChild);
			// console.log(secondChild);

			if (firstChild !== undefined) {
				switch (firstChild.type) {
					case "y":
						yesQ = firstChild.question;
						break;

					case "n":
						noQ = firstChild.question;
						break;

					default:
						break;
				}
			}

			if (secondChild !== undefined) {
				switch (secondChild.type) {
					case "y":
						yesQ = secondChild.question;
						break;

					case "n":
						noQ = secondChild.question;
						break;

					default:
						break;
				}
			}

			$(".qform")
				.show()
				.find("#qtext")
				.val(clickedQ.question);

			$(".qform")
				.find("#yq")
				.val(yesQ);

			$(".qform")
				.find("#nq")
				.val(noQ);
		});
	}
	function getQuestionById(id, questions) {
		if (questions.id == id) {
			return questions;
		}

		if (
			questions.children[0] !== undefined &&
			questions.children[0].length != 0
		) {
			var q = getQuestionById(id, questions.children[0]);
			if (q) {
				return q;
			}
			if (
				questions.children[1] !== undefined &&
				questions.children[1].length != 0
			) {
				q = getQuestionById(id, questions.children[1]);
				if (q) {
					return q;
				}
			}
		}
	}
	function updateQuestionById(id, qtext, yq, nq, questions) {
		if (questions.id == id) {
			questions.question = qtext;

			var firstChild = questions.children[0];
			var secondChild = questions.children[1];

			if (firstChild == undefined && secondChild == undefined) {
				switch (yq) {
					case "":
						if (nq !== "") {
							questions.children[0] = {
								question: nq,
								id: maxQId + 1,
								type: "n",
								children: []
							};
							maxQId++;
						}
						break;

					default:
						//yq sent
						questions.children[0] = {
							question: yq,
							id: maxQId + 1,
							type: "y",
							children: []
						};
						maxQId++;
						if (nq !== "") {
							questions.children[1] = {
								question: nq,
								id: maxQId + 1,
								type: "n",
								children: []
							};
							maxQId++;
						}
						break;
				}
			} else if (firstChild != undefined && secondChild != undefined) {
				switch (yq) {
					case "":
						if (nq !== "") {
							let nqInJson = questions.children.filter(child => {
								return child.type == "n";
							})[0];
							nqInJson.question = nq;
							questions.children = [nqInJson];
						} else {
							questions.children = [];
						}
						break;

					default:
						//yq sent
						let yqInJson = questions.children.filter(child => {
							return child.type == "y";
						})[0];
						yqInJson.question = yq;

						let nqInJson = questions.children.filter(child => {
							return child.type == "n";
						})[0];
						nqInJson.question = nq;

						if (nq !== "") {
							questions.children = [yqInJson, nqInJson];
						} else {
							questions.children = [yqInJson];
						}
						break;
				}
			} else {
				//either first or second child undefined
				switch (yq) {
					case "":
						if (nq !== "") {
							if (firstChild.type == "n") {
								questions.children[0].question = nq;
							} else {
								questions.children[0] = {
									question: nq,
									id: maxQId + 1,
									type: "n",
									children: []
								};
								maxQId++;
							}
						} else {
							//neither sent
							questions.children = [];
						}
						break;

					default:
						//yq sent
						if (nq !== "") {
							if (firstChild.type == "n") {
								questions.children[0].question = nq;
								questions.children[1] = {
									question: yq,
									id: maxQId + 1,
									type: "y",
									children: []
								};
								maxQId++;
							} else {
								//both sent, first child y
								questions.children[0].question = yq;
								questions.children[1] = {
									question: nq,
									id: maxQId + 1,
									type: "n",
									children: []
								};
								maxQId++;
							}
						} else {
							//yq sent, nq not sent
							if (firstChild.type == "n") {
								questions.children[0] = {
									question: yq,
									id: maxQId + 1,
									type: "y",
									children: []
								};
								maxQId++;
							} else {
								questions.children[0].question = yq;
							}
						}
						break;
				}
			}

			return true;
		}

		if (
			questions.children[0] !== undefined &&
			questions.children[0].length != 0
		) {
			var q = updateQuestionById(id, qtext, yq, nq, questions.children[0]);
			if (q) {
				return q;
			}
			if (
				questions.children[1] !== undefined &&
				questions.children[1].length != 0
			) {
				q = updateQuestionById(id, qtext, yq, nq, questions.children[1]);
				if (q) {
					return q;
				}
			}
		}
	}
});
