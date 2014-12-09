$.fn.live =  function ( types, data, fn ) {
  $( this.context ).on( types, this.selector, data, fn );
  return this
}