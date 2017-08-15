function getAppendContent (item) {
  switch (item.type) {
    case 'link_new_tab':
      return (
        '<li><a href="' +
        item.link +
        '" target="_blank">' +
        item.text +
        '</a></li>'
      )
      break
    case 'link':
      return '<li><a href="' + item.link + '">' + item.text + '</a></li>'
      break
  }
}

function addNavBarItems (list) {
  for (const item of list) {
    if (item.type == 'dropdown') {
      content =
        '<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>' +
        item.title +
        '</span><span class="caret"></span></a><ul class="dropdown-menu" role="menu">'
      for (let j = 0; j < item.count; j++) {
        content += getAppendContent(item.menu[j])
      }
      content += '</ul></li>'
      $('#navbar-unordered-list').append(content)
    } else {
      $('#navbar-unordered-list').append(getAppendContent(item))
    }
  }
}

function addFeatureText (data) {
  $('#feature-1-title').text(data.feature_1_title)
  $('#feature-1-text').text(data.feature_1_text)
  $('.fa-users').removeClass('fa-users').addClass(data.feature_1_fa)
  $('#feature-2-title').text(data.feature_2_title)
  $('#feature-2-text').text(data.feature_2_text)
  $('.fa-share-alt').removeClass('fa-share-alt').addClass(data.feature_2_fa)
  $('#feature-3-title').text(data.feature_3_title)
  $('#feature-3-text').text(data.feature_3_text)
  $('.fa-cloud').removeClass('fa-cloud').addClass(data.feature_3_fa)
  $('#footer-introduction').text(data.introdution_text)
  $('#btn-register').text(data.start_button_text)
}

function changeBackground (url) {
  if ($('.index-background').length > 0) {
    $('.index-background').attr('src', url)
  } else {
    $('.wrapper').css('background-image', `url("${url}")`)
  }
}

$.getJSON('index-style', ({ bg, feature, navbar }) => {
  changeBackground(bg)
  addFeatureText(feature)
  addNavBarItems(navbar)
})
