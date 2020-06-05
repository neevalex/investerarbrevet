const low = require("lowdb");
const FileSync = require("lowdb/adapters/FileSync");
const adapter = new FileSync("db.json");
const db = low(adapter);
var convert = require('xml-js');


var fs = require('fs');

var request = require("request-promise");
const cheerio = require("cheerio");

var lineReader = require('line-reader');



async function get_product(url, cat) {

    console.log(url);
    await request.get({
        uri: url,
        transform: function(body, res){
            return body;
        }
    }).then(function(response){
        
        var $ = cheerio.load(response);

        if(!$('.object-2521').length) { return; }

        var content = $('.object-2521').html();
        var title = $("title").text();
       
        var date = content.substring(
            content.lastIndexOf("<p>Publicerad") + 15,
            content.lastIndexOf("</p>\n\n<h1>")
        );

        url = url.replace("https://www.investerarbrevet.se/", "");

        var img = $('.object-2521').children('img').eq(0).attr('src');
        //console.log(img);
        db.get("articles")
				.push({
					url,
                    title,
                    date,
                    img,
                    cat,
                    content : { '_cdata': content }
                    
				})
            .write();





    })
    .catch(function(err){
        console.error('404 - '+url); // This will print any error that was thrown in the previous error handler.
    });

    return;
}


async function get_cat(url) {

    console.log(url);
    await request.get({
        uri: url,
        transform: function(body, res){
            return body;
        }
    }).then(function(response){
        
        var $ = cheerio.load(response);

        $('.pure-u-lg-3-5 .pure-g-r.sslayout > div > a').each(function (i, elem) {
            // Range Name
            var link = $(this).attr('href');

            var cat =  url.substring(
                url.lastIndexOf(".se/") + 4,
                url.lastIndexOf("?page")
            );

            db.get("categories").push({link,cat}).write();

        });
      
    })
    .catch(function(err){
        console.error('404 - '+url); // This will print any error that was thrown in the previous error handler.
    });

    return;
}



async function main() {


    var array = db.get("categories").value();
    for (i in array) {
        console.log(array[i].link);
        await get_product(array[i].link, array[i].cat);
        console.log(i+'\\'+array.length);
    }
    console.log('done!');
    
}




async function cat() {

    var cats = [];

    var fs = require('fs');
    var array = fs.readFileSync('cats.txt').toString().split("\n");
    for(i in array) {
        await get_cat(array[i]);
        console.log(i+'\\'+array.length);
    }
    console.log('done!');
}




var myArgs = process.argv.slice(2);

switch (myArgs[0]) {

    case 'get':
        db.set("articles", []).write();
        main();
        break;
    case 'cat':
        db.set("categories", []).write();
        cat();
        break;
    case 'xml':

        items = [];
		items['articles'] = db.get("articles").value();
		//console.log(items);
		
		var options = {compact: true, spaces: 4};
		var xml = convert.json2xml(items, options);

		fs.writeFile('output.xml', '<output>'+xml+'</output>', 'utf8', function (err) {
			if (err) return console.log(err);
			console.log('done');
        });
        
        break;
    default:

}