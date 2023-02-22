<style>
    .fa-lg {
  font-size: 1.59em !important;
  line-height: 1 !important;
  vertical-align: -.075em;
  margin:1px !important;
}
</style>
<!-- Modal -->
<div class="modal " id="stripemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Enter Your Card Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form id="stripe_form">
           <div class="form-group">
               <button class="btn btn-primary col-12"><i class="fa fa-credit-card ml-1"></i>Credit/Debit Card</button>
           </div>
           <div class="form-group">
               <label>Name On Card</label>
               <input type="text" id="card_name" class="form-control" placeholder="Full Name ON card"/>
               <p id="name_error" class="text-danger"></p>
           </div>
           <div class="form-group">
               <label>Card Number</label>
               <div class="input-group">
                   <input type="number" id="card_number" class="form-control" placeholder="Card Number"  />
                   <div class="input-group-append">
                    <span class="input-group-text text-muted">
                        <i class="fab fa-cc-visa fa-lg"></i>
                        <i class="fab fa-cc-amex fa-lg"></i>
                        <i class="fab fa-cc-mastercard fa-lg"></i>
                   </span> 
                </div>
               </div>
                <p id="card_error" class="text-danger"></p>
           </div>
           <div class="row">
              <div class="form-group col-8">
              <label class="form-label">Expiration<label>
              <input type="text"  maxlength="2" class="form-control col-4" id="month" placeholder="MM"/>
              <input type="text"  maxlength="4" class="form-control col-4" id="year" placeholder="YYYY" />
           </div>
           <div class="form-group col-4">
            <label class="form-label">CVV</label>
            <input type="text"  maxlength="3" class="form-control" id="cvv" placeholder="CVV"/>
           </div>  
           </div>
            <p id="month_error" class="text-danger"></p>
             <p id="year_error" class="text-danger"></p>
              <p id="cvv_error" class="text-danger"></p>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary" id="stripe_submit">Submit</button>-->
      </div>
    </div>
  </div>
</div>