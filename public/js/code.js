Number.prototype.toBrl = function () {
return 'R$ ' + this.toFixed(2).replace('.', ',');
}

  