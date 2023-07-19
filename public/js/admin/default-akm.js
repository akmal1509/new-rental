//Variable token for POST
var token = $("meta[name='csrf-token']").attr('content')

//Image Preview Backend
function previewImage() {
  const image = document.querySelector('#featured-image-input')
  const imgPreview = document.querySelector('.featured-image-preview')

  imgPreview.classList.remove('d-none')

  const oFReader = new FileReader()
  oFReader.readAsDataURL(image.files[0])

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result
  }
}

function previewImage2(input, preview) {
  const image = document.querySelector('#' + input)
  const imgPreview = document.querySelector('#' + preview)

  imgPreview.classList.remove('d-none')

  const oFReader = new FileReader()
  oFReader.readAsDataURL(image.files[0])

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result
  }
}

//Delete specific data
function deleteData(id, type, urlData) {
  var method = $("meta[name='method-delete']").attr('content')
  $.ajax({
    type: 'POST',
    url: '/admin/' + urlData + '/' + id,
    data: {
      id: id,
      type: type,
      _token: token,
      _method: method,
    },
    success: function () {
      location.replace('/admin/' + urlData)
    },
  })
}



//Delete permanent Data
function forceDeleteData(id, type, urlData) {
  $.ajax({
    type: 'POST',
    url: '/admin/' + urlData + '/force',
    data: {
      id: id,
      type: type,
      _token: token,
    },
    success: function () {
      location.replace('/admin/' + urlData + '/trashed')
    },
  })
}

//restore softDelete Data
function restoreData(id, type, urlData) {
  $.ajax({
    type: 'POST',
    url: '/admin/' + urlData + '/restore',
    data: {
      id: id,
      type: type,
      _token: token,
    },
    success: function () {
      location.replace('/admin/' + urlData + '/trashed')
    },
  })
}

//Duplicate Data
function duplicateData(id, type, slug, urlData) {
  $.ajax({
    type: 'POST',
    url: '/admin/' + urlData + '/duplicate',
    data: {
      id: id,
      type: type,
      slug: slug,
      _token: token,
    },
    success: function (data) {
      location.replace('/admin/' + urlData)
      console.log(data)
    },
  })
}

function bulkAction(type, urlData) {
  var checkedData = []
  var action = $('#bulk').val()
  $('.akm-check-box:checked').each(function () {
    checkedData.push($(this).data('id'))
  })
  if (checkedData <= 0) {
    alert('Please select atleast one record')
  }
  $.ajax({
    type: 'POST',
    url: '/admin/' + urlData + '/bulk',
    data: {
      type: type,
      id: checkedData,
      action: action,
      _token: token,
    },
    success: function (data) {
      location.replace('/admin/' + urlData)
      console.log(data)
    },
  })
}

function carChange() {
  var plat = $('#platId').val()
  // const url = '{{ asset($imageStorage . ' / ') }}'
  $.ajax({
    type: 'POST',
    url: '/admin/rent/image-change',
    data: {
      plat: plat,
      _token: token
    },
    success: function (data) {
      console.log(data)
      $('#carImage').attr('src', url + '/' + data)
    },
  })
  calculate()
}

function calculate() {
  var to = $('#pickUp').val()
  var from = $('#return').val()
  var plat = $('#platId').val()
  // console.log($('#pickUp').val(picker.format('MM')))
  $('#spin').css('display', 'flex')
  $.ajax({
    type: 'POST',
    url: '/admin/rent/calculate',
    data: {
      to: to,
      from: from,
      plat: plat,
      _token: token
    },
    success: function (data) {
      $('#price').val(data['totalPrice']),
        $('#longDays').val(data['longDays']),
        $('#priceDays').val(data['priceDays'])
      $('#spin').css('display', 'none')
    },
  })
}

//Logout
function logout() {
  $.ajax({
    type: 'POST',
    url: '/logout',
    data: {
      _token: token,
    },
    success: function (data) {
      location.replace('/administrator')
    },
  })
}

const spinnerWrapper = document.querySelector('#allSpin')
window.addEventListener('load', () => {
  spinnerWrapper.style.opacity = '0'

  setTimeout(() => {
    spinnerWrapper.style.display = 'none'
  }, 200)
})

function goLog(id, subject, user) {
  $.ajax({
    type: 'POST',
    url: '/admin/log',
    data: {
      logId: id,
      userId: user,
      _token: token,
    },
    success: function (data) {
      location.replace('/admin/booking/' + subject)
    },
  })
}

var page = 1;
infinteLoadMore(page);
$('.notif-log').scroll(function () { //detect page scroll
  if ($('.notif-log').scrollTop() + $('.notif-log').height() >= $('.check-height').outerHeight(
    true)) { //if user scrolled from top to bottom of the page
    page++; //page number increment
    console.log('hahahihi')
    infinteLoadMore(page);
  }
  // console.log($('.check-height').outerHeight(true))
});

function infinteLoadMore(page) {
  $.ajax({
    url: ENDPOINT + "/general/header/log?page=" + page,
    datatype: "html",
    type: "get",
    beforeSend: function () {
      $('.auto-load').show();
      $(".dropdown-list-icons").getNiceScroll().resize();
    }
  })
    .done(function (response) {
      if (response.length == 0) {
        $('.auto-load').html("We don't have more data to display :(");
        return;
      }
      $('.auto-load').hide();
      $("#notif-header").append(response);
      $(".dropdown-list-icons").getNiceScroll().resize();
      console.log(response)
    })
    .fail(function (jqXHR, ajaxOptions, thrownError) {
      console.log('Server error occured');
    });
}

function myNotifLog() {
  $.ajax({
    type: 'POST',
    url: ENDPOINT + '/general/header/log/notif',
    data: {
      _token: token
    },
    beforeSend: function () {
      $('.nav-link.notification-toggle.nav-link-lg').removeClass('beep')
    },
    success: function (data) {
      console.log(data)
    }
  })
}