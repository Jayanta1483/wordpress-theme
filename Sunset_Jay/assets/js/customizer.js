






/*

Getting the read more text control with the first parameter
and then passing the control object as second parameter


*/

wp.customize.control('sunset_read_more_text', function(readMoreTextControl){

      /* Getting the read more sctivation setting function into a variable */

      const sunsetReadMoreActivationSettings = wp.customize('sunset_read_more_activation');


      /* Keeping the control of readmore text visbile or hidden by using active.set() method
      based on certain condition passed as parameter.
      So when the value is true it will remain visible and when false then invisible */

      readMoreTextControl.active.set(true == sunsetReadMoreActivationSettings.get());


      /* Doing the same as above only when the readmore activation checkbox is clicked
         and the value is changed */

      sunsetReadMoreActivationSettings.bind(function(){
        readMoreTextControl.active.set(true == this.get());
      })

})


const readMoreBtn = document.getElementById('readMoreBtn');

console.log(readMoreBtn)
