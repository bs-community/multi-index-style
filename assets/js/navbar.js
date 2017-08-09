$.getJSON('index-style/navbar', function(data) {
  for (i = 0; i < data.length; i++) {
    if (data[i].type == 'dropdown') {
      content =
        '<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>' +
        data[i].title +
        '</span><span class="caret"></span></a><ul class="dropdown-menu" role="menu">'
      for (var j = 0; j < data[i].count; j++) {
        content += getAppendContent(data[i].menu[j])
      }
      content += '</ul></li>'
      $('#navbar-unordered-list').append(content)
    } else {
      $('#navbar-unordered-list').append(getAppendContent(data[i]))
    }
  }
})

function getAppendContent(item) {
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
