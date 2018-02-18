const JSZip = require('jszip')
const glob = require('glob')
const fs = require('fs')
const path = require('path')
const { version, name } = require('./package.json')

const zip = (new JSZip()).folder(name)
const root = zip.folder(name)

function addDir (dir) {
  fs.readdirSync(dir).forEach(f => {
    const filename = dir + '/' + f
    const stat = fs.statSync(filename)
    if (stat.isDirectory()) {
      addDir(filename)
    } else if (stat.isFile()) {
      const location = dir.split('/').reduce((carry, name) => carry.folder(name), root)
      location.file(f, fs.readFileSync(filename))
    }
  })
}

;['bootstrap.php', 'callbacks.php', 'LICENSE', 'package.json', 'assets/js/dist.js'].forEach(file => {
  root.file(file, fs.readFileSync(file))
})

;['src', 'views', 'lang', 'assets/css'].forEach(addDir)

zip.generateNodeStream({
  streamFiles: true,
  compression: 'DEFLATE',
  compressionOptions: { level: 9 }
}).pipe(fs.createWriteStream(`${name}_${version}.zip`))
