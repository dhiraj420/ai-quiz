let quizData = [];
$(function () {

  $('#generateBtn').on('click', function () {
    let topic = $('#topic').val();
    if (!topic) {
        alert('Please enter a topic');
        return;
    }
    
    $.ajax({
      url: 'generate_quiz.php',
      method: 'POST',
      contentType: 'application/json',
      data: JSON.stringify({ topic: topic }),
      success: function (data) {
        quizData = data?.questions || [];
        $('#quizContainer').html('');

        quizData.forEach((q, i) => {
            let ques = `
              <div class="mb-4 question" data-index="${i}">
                <p><b>${i + 1}. ${q.question}</b></p>`;

              q.options.forEach((o, j) => {
                ques += `
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="q${i}" value="${j}">
                      <label class="form-check-label">${o}</label>
                  </div>`;
              });

              ques += `
                  <div class="text-danger mt-2 error" style="display:none">
                      Please select an answer
                  </div>
                  <div class="mt-2 explanation p-2 text-warning border" style="display:none"></div>
                </div>`;

              $('#quizContainer').append(ques);
        });
        $('#topicResp').val(topic);
        $('#quizForm').show();
        $('#result').html('');
      }
    });
  });

  
  $('#quizForm').on('submit', function (e) {
    e.preventDefault();
    let hasError = false;
    let count = 0;
    
    if($('#result').html()){
      $('#resetBtn').trigger('click');
      return;
    }

    $('.question').each(function () {
        var index = $(this).data('index');
        var selected = $(`input[name=q${index}]:checked`).val();
        if (selected === undefined) {
            $(this).find('.error').show();
            hasError = true;
        } else {
            $(this).find('.error').hide();
        }
    });

    if (hasError) {
        alert('Please answer all questions');
        return;
    }

    $('.question').each(function () {
        var index = $(this).data('index');
        var selected = parseInt($(`input[name=q${index}]:checked`).val());
        var correct = quizData[index].correctIndex;

        $("input[type='radio']").css('pointer-events', 'none');
        $(`input[name=q${index}][value=${correct}]`).closest('.form-check').addClass('bg-success text-white p-1 rounded');

        $(this).find('.explanation').text('Explanation: ' + quizData[index].explanation).show();
        if (selected !== correct) {
            $(`input[name=q${index}][value=${selected}]`).closest('.form-check').addClass('bg-danger text-white p-1 rounded');
        }else{
          count++;
        }
    });

    $.ajax({
      url: 'submit_quiz.php',
      method: 'POST',
      contentType: 'application/json',
      data: JSON.stringify({ quizData, count, topic: $('#topicResp').val() }),
      success: function (res) {
          res = JSON.parse(res)
          $('#result').html(res.html).focus();
      }
    });
  });

  $('#resetBtn').on('click', function (e) {
    // resetting all values
    $('#quizForm').hide();
    $('#quizContainer').html('');
    quizData = [];
    $('#topic').val('');
    $('#result').html('');
  });

});