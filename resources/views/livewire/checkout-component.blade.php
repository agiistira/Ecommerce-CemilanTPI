<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Checkout</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <form wire:submit.prevent="placeOrder">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Billing Address</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">Nama Depan<span>*</span></label>
                                    <input type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">
                                    @error('firstname')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">Nama Belakang<span>*</span></label>
                                    <input type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
                                    @error('lastname')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Alamat Email:</label>
                                    <input type="email" name="email" value="" placeholder="Type your email" wire:model="email">
                                    @error('email')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">No Hp<span>*</span></label>
                                    <input type="number" name="phone" value="" placeholder="10 digits format" wire:model="mobile">
                                    @error('mobile')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Alamat</label>
                                    <input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line1">
                                    @error('line1')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Alamat</label>
                                    <input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line2">
                                    @error('line2')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Negara<span>*</span></label>
                                    <input type="text" name="country" value="" placeholder="United States" wire:model="country">
                                    @error('country')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Provinsi<span>*</span></label>
                                    <input type="text" name="Province" value="" placeholder="Province" wire:model="province">
                                    @error('province')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Kota<span>*</span></label>
                                    <input type="text" name="city" value="" placeholder="City name" wire:model="city">
                                    @error('city')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Kode Pos:</label>
                                    <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="Zipcode">
                                    @error('Zipcode')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form fill-wife">
                                    <label class="checkbox-field">
                                        <input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
                                        <span>Kirim ke Alamat berbeda?</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                    </div>

                    @if ($ship_to_different == 1)
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Billing Address</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">Nama Depan<span>*</span></label>
                                    <input type="text" name="fname" value="" placeholder="Your name" wire:model="s_firstname">
                                    @error('s_firstname')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">Nama Belakang<span>*</span></label>
                                    <input type="text" name="lname" value="" placeholder="Your last name" wire:model="s_lastname">
                                    @error('s_lastname')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Alamat Email :</label>
                                    <input type="email" name="email" value="" placeholder="Type your email" wire:model="s_email">
                                    @error('s_email')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">No Hp<span>*</span></label>
                                    <input type="number" name="phone" value="" placeholder="10 digits format" wire:model="s_mobile">
                                    @error('s_mobile')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Alamat Lengkap:</label>
                                    <input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="s_line1">
                                    @error('s_line1')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Alamat Lengkap:</label>
                                    <input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="s_line2">
                                    @error('s_line2')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Negara<span>*</span></label>
                                    <input type="text" name="country" value="" placeholder="United States" wire:model="s_country">
                                    @error('s_country')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Provinsi<span>*</span></label>
                                    <input type="text" name="Province" value="" placeholder="Province" wire:model="s_province">
                                    @error('s_province')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Kota<span>*</span></label>
                                    <input type="text" name="city" value="" placeholder="City name" wire:model="s_city">
                                    @error('s_city')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Kode Pos:</label>
                                    <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="s_Zipcode">
                                    @error('s_Zipcode')<span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Metode Pembayaran</h4>
                        {{-- <p class="summary-info"><span class="title">Check / Money order</span></p>
                        <p class="summary-info"><span class="title">Credit Cart (saved)</span></p> --}}
                        <p class="row-in-form">
                            <label for="zip-code">Pilih Metode Pembayaran</label>
                                <select class="form-control" wire:model="metode">
                                    <option value="cod">Antar ke Tempat (COD)</option>
                                    <option value="pickup">Ambil di Tempat (Pick Up)</option>
                                </select>
                        </p>
                        <button type="submit" class="btn btn-medium">Pesan Sekarang</button>
                    </div>
                </div>
            </form>
        </div><!--end main content area-->
    </div><!--end container-->

</main>
