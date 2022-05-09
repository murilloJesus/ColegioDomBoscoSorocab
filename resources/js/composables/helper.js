

    function normalize_url(s){
        return especialCharMask(s).replace(/ /g, '-').replace(/\//g, '-').replace(/%/g, '-').replace(/---/g, '-').replace(/#/g, 'hashtag-').replace(/:/g, '')
    }

    function especialCharMask (s){
        let r=s.toLowerCase();
        r = r.replace(new RegExp("[àáâãäå]", 'gi'),"a");
        r = r.replace(new RegExp("æ", 'gi'),"ae");
        r = r.replace(new RegExp("ç", 'gi'),"c");
        r = r.replace(new RegExp("[èéêë]", 'gi'),"e");
        r = r.replace(new RegExp("[ìíîï]", 'gi'),"i");
        r = r.replace(new RegExp("ñ", 'gi'),"n");
        r = r.replace(new RegExp("[òóôõö]", 'gi'),"o");
        r = r.replace(new RegExp("œ", 'gi'),"oe");
        r = r.replace(new RegExp("[ùúûü]", 'gi'),"u");
        r = r.replace(new RegExp("[ýÿ]", 'gi'),"y");
        return r;
    }

    export { normalize_url }


