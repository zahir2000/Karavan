$(document).ready(function () {
  $("#journal").show();

  for (var i = 0; i < 100; i++) {
    var star =
      '<div class="star m-0" style="animation: twinkle ' +
      (Math.random() * 5 + 5) +
      's linear ' +
      (Math.random() * 1 + 1) +
      's infinite; top: ' +
      Math.random() * $(window).height() +
      'px; left: ' +
      Math.random() * $(window).width() +
      'px;"></div>';
    $('.homescreen').append(star);
  }

  $('#books input:text').keyup(function () {
    updateBookResult()
  });

  $('#journal input:text').keyup(function () {
    updateJournalResult()
  });

  $('#conference input:text').keyup(function () {
    updateConferenceResult()
  });

  $('#book-chapter input:text').keyup(function () {
    updateBookChapterResult()
  });

  $("#type").change(function () {
    stateChange($(this).val());
  });

  function stateChange(stateValue) {
    $("form").hide();

    switch (stateValue) {
      case 'journal':
        $("#journal").show();
        break;
      case 'conference':
        $("#conference").show();
        break;
      case 'book-chapter':
        $("#book-chapter").show();
        break;
      case 'book':
        $("#books").show();
        break;
      case 'others':
        $("#others").show();
        break;
    }
  }

  function updateJournalResult() {
    result = "";
    title = document.getElementById('title').value;
    journalTitle = document.getElementById('journalTitle').value;
    volume = document.getElementById('volume').value;
    year = document.getElementById('year').value;
    pages = document.getElementById('pages').value;
    authors = document.getElementById('authors').value;
    impactFactor = document.getElementById('impactFactor').value;
    citation = document.getElementById('citation').value;

    if (title) {
      result += title + ". ";
    }

    if (journalTitle) {
      result += journalTitle + ", ";
    }

    if (volume) {
      result += volume + ", ";
    }

    if (year) {
      result += year + ", ";
    }

    if (pages) {
      result += "pp. " + pages + ". ";
    }

    if (authors) {
      result += "(with " + authors + "),";
    }

    if (impactFactor) {
      result += " IF: " + impactFactor + ", ";
    }

    if (citation) {
      result += citation + ".";
    }

    document.getElementById('result').value = result;
  }

  function updateConferenceResult() {
    result = "";
    title = document.getElementById('conference_title').value;
    title_2 = document.getElementById('conference_title-2').value;
    pages = document.getElementById('conference_pages').value;
    place = document.getElementById('conference_place').value;
    date = document.getElementById('conference_date').value;
    authors = document.getElementById('conference_authors').value;
    citation = document.getElementById('conference_citation').value;

    if (title) {
      result += title + ". ";
    }

    if (title_2) {
      result += "In: " + title_2 + ", ";
    }

    if (pages) {
      result += "pp. " + pages + ", ";
    }

    if (place) {
      result += place + ", ";
    }

    if (date) {
      result += date + ". ";
    }

    if (authors) {
      result += "(with " + authors + ") ";
    }

    if (citation) {
      result += citation + ".";
    }

    document.getElementById('conference_result').value = result;
  }

  function updateBookResult() {
    result = "";
    title = document.getElementById('books_title').value;
    publisher = document.getElementById('books_publisher').value;
    year = document.getElementById('books_year').value;
    isbn = document.getElementById('books_isbn').value;
    authors = document.getElementById('books_authors').value;

    if (title) {
      result += title + ". ";
    }

    if (publisher) {
      result += publisher + ", ";
    }

    if (year) {
      result += year + ", ";
    }

    if (isbn) {
      result += "ISBN: " + isbn + " ";
    }

    if (authors) {
      result += "(with " + authors + ").";
    }

    document.getElementById('books_result').value = result;
  }
})

function updateBookChapterResult() {
  result = "";
  title = document.getElementById('book-chaters_title').value;
  title_2 = document.getElementById('book-chaters_title-2').value;
  volume = document.getElementById('book-chaters_volume').value;
  year = document.getElementById('book-chaters_year').value;
  pages = document.getElementById('book-chaters_pages').value;
  authors = document.getElementById('book-chaters_authors').value;
  citation = document.getElementById('book-chaters_citation').value;

  if (title) {
    result += title + ". ";
  }

  if (title_2) {
    result += title_2 + ", ";
  }

  if (volume) {
    result += volume + ", ";
  }

  if (year) {
    result += year + ", ";
  }

  if (pages) {
    result += "pp. " + pages + ". ";
  }

  if (authors) {
    result += "(with " + authors + ") ";
  }

  if (citation) {
    result += citation + ".";
  }

  document.getElementById('book-chaters_result').value = result;
}

var toggleInputContainer = function (input) {
  if (input.value != "") {
    input.classList.add('filled');
  } else {
    input.classList.remove('filled');
  }
}

var labels = document.querySelectorAll('.label');
for (var i = 0; i < labels.length; i++) {
  labels[i].addEventListener('click', function () {
    this.previousElementSibling.focus();
  });
}

window.addEventListener("load", function () {
  var inputs = document.getElementsByClassName("input");
  for (var i = 0; i < inputs.length; i++) {
    console.log('looped');
    inputs[i].addEventListener('keyup', function () {
      toggleInputContainer(this);
    });
    toggleInputContainer(inputs[i]);
  }
});

var el = document.getElementById('demo');
el.addEventListener('long-press', function (e) {
  // do something
});