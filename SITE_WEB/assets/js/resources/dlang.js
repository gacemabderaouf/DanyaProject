/* Example definition of a simple mode that understands a subset of
 * JavaScript:
 */

CodeMirror.defineSimpleMode("dlang", {

  start: [


    {regex: /-post(?=\[)|-affichertable|-afficherslide|-fuck|-p(?=\[)|-titre[2-3](?=\[)|-titre(?=\[)|-slide(?=\[)|-affichertabs1|-affichertabs2|-tabs(?=\[)|-entetetable(?=\[)|-lignetable(?=\[)|-gettable(?=\[)|-slide(?=\[)|-ruban(?=\[)|-getnum(?=\[)|-num(?=\[)|-puce(?=\[)|-getpuce(?=\[)|-image(?=\[)|-getimage(?=\[)|-lvm(?=\[)|-lvm(?=\[)|-lvu(?=\[)|-lvs(?=\[)|-note(?=\[)|-alerte(?=\[)|-observation(?=\[)|-regle(?=\[)|-forme(?=\[)|-definition(?=\[)|-youtube(?=\[)|-iframe(?=\[)|-video(?=\[)|-getyoutube(?=\[)|-getiframe(?=\[)|-getvideo(?=\[)|-colonnes(?=\[)|-getcolonnes(?=\[)|-telecharger(?=\[)|-taille(?=\[)|-g(?=\[)|-i(?=\[)|-s(?=\[)|-gis(?=\[)|-gi(?=\[)|-gs(?=\[)|-si(?=\[)|-gs(?=\[)|-getp(?=\[)|-couleur(?=\[))|-afficherpost(?=\[)/i,
     token: "keyword"},
      {regex: /(-[A-Za-z0-9_\-]+)(?=\[)/i, token: "derror"},


      {regex: /true|false|null|undefined/, token: "atom"},
      {regex: /#[a-f0-9]{6}/i, token: "hex"},
      {regex: /\|/, token: "separator"},
    {regex: /0x[a-f\d]+|[-+]?(?:\.\d+|\d+\.?\d*)(?:e[-+]?\d+)?/i,
     token: "number"},
    {regex: /\/\*[a-z0-9_ \/\*.,']*\*\//i, token: "comment"},
    {regex: /\/(?:[^\\]|\\.)*?\//, token: "variable-3"},
    //{regex: /\/\*/, token: "comment", next: "comment"},
    {regex: /[-+\/*=<>!]+/, token: "operator"},

    {regex: /[\{\[\(]/, indent: true},
    {regex: /[\}\]\)]/, dedent: true},

    {regex: /[a-z$][\w$]*/i, token: "variable"},
  ],
  comment: [
    {regex: /.*?\*\//, token: "comment", next: "start"},
    {regex: /.*/, token: "comment"}
  ],
  meta: {
    dontIndentStates: ["comment"],
    lineComment: "//"
  }
});

