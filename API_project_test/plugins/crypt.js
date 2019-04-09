var crypto = require('crypto');

exports.cryptMD5 = function(pw, salt) {
	var magic = '$1$';
	var fin;
	var sp = salt || generateSalt(8);

	var ctx = crypto.createHash('md5');

	// The password first, since that is what is most unknown 
	// Then our magic string 
	// Then the raw salt
	ctx.update(pw + magic + sp);

	// Then just as many characters of the MD5(pw,sp,pw)
    var ctx1 = crypto.createHash('md5');
    ctx1.update(pw);
	ctx1.update(sp);
	ctx1.update(pw);
	var fin = ctx1.digest("binary");

	for(var i = 0; i < pw.length ; i++) {
		ctx.update(fin.substr(i % 16, 1),'binary');
	}

	// Then something really weird...

	// Also really broken, as far as I can tell.  -m
	// Agreed ;) -dd

	for (var i = pw.length; i; i >>= 1) {
		ctx.update ( (i & 1) ? "\x00" : pw[0] );
	}

	fin = ctx.digest("binary");

	// and now, just to make sure things don't run too fast
    for (var i = 0; i < 1000; i++) {
	    var ctx1 = crypto.createHash('md5');

        if (i & 1) {
            ctx1.update(pw);
        } else {
            ctx1.update(fin,'binary');
		}

        if (i % 3) {
            ctx1.update(sp);
		}

        if (i % 7) {
            ctx1.update(pw);
		}

        if (i & 1) {
            ctx1.update(fin,'binary');
        } else {
            ctx1.update(pw);
		}

        fin = ctx1.digest("binary")
	}

	return magic + sp + '$' + to64(fin);

}


function to64(data) {
    // This is the bit that uses to64() in the original code.

    var itoa64 = ['.','/','0','1','2','3','4','5','6','7','8','9','A','B','C','D',
		          'E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T',
		          'U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j',
		          'k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

    var rearranged = '';

	var opt = [[0, 6, 12], [1, 7, 13], [2, 8, 14], [3, 9, 15], [4, 10, 5]];

	for (var p in opt) {
		var l = data.charCodeAt( opt[p][0] ) << 16 | data.charCodeAt( opt[p][1] ) << 8 | data.charCodeAt( opt[p][2] );

		for (var i = 0; i < 4; i++) {
            rearranged += itoa64[l & 0x3f]; l >>= 6
		}
	}

	var l = data.charCodeAt(11);
	for (var i = 0; i < 2; i++) {
        rearranged += itoa64[l & 0x3f]; l >>= 6
	}

    return rearranged;
}


var SaltLength = 8;

function generateSalt(len) {
  var set = '0123456789abcdefghijklmnopqurstuvwxyzABCDEFGHIJKLMNOPQURSTUVWXYZ',
      setLen = set.length,
      salt = '';
  for (var i = 0; i < len; i++) {
    var p = Math.floor(Math.random() * setLen);
    salt += set[p];
  }
  return salt;
}