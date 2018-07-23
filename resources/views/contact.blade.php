@extends('layouts.app')

@section('content')
    <section class="contact">
        <section class="contact__form">
            <form class="contact__form" action="submited">
                <div class="animation-container">
                    <h1 class="contact__title u-title type-1"> Contact us</h1>
                    <p class="contact__desc">
                        If you have any questions, suggestions or need help, please contact us via the form below.
                    </p>
                    <div style="opacity:0" class="alert alert-danger" role="alert">
                        Please complete required fields.
                    </div>
                    <div action="" name="form-step-1">
                        <div class="fieldgroup">
                            <input type="text" name="title" id="title" class="required"/>
                            <label for="title">Name : *</label>
                        </div>

                        <div class="fieldgroup">
                            <input type="text" name="type" id="type" class="required"/>
                            <label for="type">Email *</label>
                        </div>
                        <div class="fieldgroup">
                            <select class="select" name="" id="">
                                <option value="Account Support">Account Support</option>
                                <option value="Projects and Images Support">Projects and Images Support</option>
                                <option value="Partnership">Partnership</option>
                                <option value="Other">Other</option>
                            </select>
                            <label for="type">Reason to contact: *</label>
                        </div>


                        <div class="fieldgroup">
                            <textarea name="description" id="" cols="30" rows="5"></textarea>
                            <label for="description">Your message : *</label>
                        </div>

                        <div class="buttons">
                            <button type="submit" class="c-button btn">Send</button>
                        </div>
                    </div>
                </div>

            </form>
        </section>
        <section class="contact__infos">
            <div class="animation-container">
                <h1 class="contact__title u-title type-1"> Contact information</h1>
                <p class="contact__desc">
                    If you have any questions, suggestions or need help, please contact us via the form below.
                </p>
                <div class="contact__item">
                    <h2 class="u-title type-3">Adress</h2>
                    <ul>
                        <li>Herman Teirlinnckgebouw B</li>
                        <li>Avenue du Port 88</li>
                        <li>1000 Brussels</li>
                    </ul>
                </div>
                <div class="contact__item">
                    <h2 class="u-title type-3">Email</h2>
                    <a href="mailto:hilde.luyts@vlaanderen.be">hilde.luyts@vlaanderen.be</a>
                </div>
                <div class="contact__item">
                    <h2 class="u-title type-3">Tel.</h2>
                    <a href="tel:(+32)2 553 83 25">(+32)(0)2 553 83 25</a>
                </div>
            </div>
        </section>
    </section>

@endsection
