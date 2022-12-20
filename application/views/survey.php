<style>
    .scale-div {
        border-top-left-radius: 2em;
        border-top-right-radius: 2em;
        overflow: auto;
    }
    .card-body {
        border-bottom-left-radius: 2em;
        border-bottom-right-radius: 2em;
    }

    /* Style the form */
    /* #regForm {
    background-color: #ffffff;
    margin: 100px auto;
    padding: 40px;
    width: 70%;
    min-width: 300px;
    } */

    /* Style the input fields */
    input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
    background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
    display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
    }

    /* Mark the active step: */
    .step.active {
    opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
    background-color: #04AA6D;
    }
    
</style>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-lg-2 col-xs-12 offset-2  p-5 text-color">
            <a href="<?php echo base_url('survey/') ?>" class="navbar-brand logo">AI 도시를 부탁해!</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-5 header-text-container">
            <p class="header-text mt-3 text-color">문제의 상황 설명과 선택지의 근거를 바탕으로 선택해주세요. 총 9 문항입니다.</p>
        </div>
    </div>

    <template id="steps-template">
        <span class="step"></span>
    </template>

    <div class="row">
        <div class="col-lg-8 col-xs-12">
            <div class="p-3 progress-indicator">
            </div>
        </div>
        <div class="col-12 col-xl-4 next-page-indicator text-center mt-3">
            <button type="button" id="prevBtn">Previous</button>
            <button type="button" id="nextBtn">Next</button>
        </div>
    </div>

    <template id="datatemplate">
        <div class="tab col-lg-12">
            <div class="col-lg-6 offset-2 col-xs-12 text-color" >
                <p>{{question}}</p>
            </div>
            <div class="col-lg-8 col-xs-12 p-3 gap-3 offset-2 d-flex flex-row bd-highlight">                
                <div class="scale-div col-lg-6" data-value="agree" data-qnum='{{qnum}}'>
                    <label for="ag{{qnum}}">
                    <picture>
                        <source srcset='./../{{agree_img}}' type="image/svg+xml">
                        <img class="img-fluid" src='./../{{agree_img}}' alt="agree" id="answer" />
                    </picture>
                    <div class="card-title-t text-center p-2 text-color">
                        <h5>{{agree_title}}</h5>
                    </div>
                    <div class="card-body card-height text-color p-3">
                        <p>{{agree_desc}}</p>
                    </div>                  
                    <input type="radio" name="rq{{qnum}}" id="ag{{qnum}}" require></label>
                </div>
                <div class="scale-div col-lg-6" data-value="disagree" data-qnum='{{qnum}}'>
                    <label for="dis{{qnum}}">
                    <picture>
                        <source srcset='./../{{disagree_img}}' type="image/svg+xml">
                        <img class="img-fluid" src='./../{{disagree_img}}' alt="disagree" id="answer" />
                    </picture>
                    <div class="card-title-t text-center p-2 text-color">
                        <h5>{{disagree_title}}</h5>
                    </div>
                    <div class="card-body card-height text-color p-3">
                        <p>{{disagree_desc}}</p>                        
                    </div>
                    <input type="radio" name="rq{{qnum}}" id="dis{{qnum}}" require></label>                  
                </div>
            </div>
        </div> 
    </template>
    
    <div class="row mt-5">
        <form action="" id="regForm">
            <div id="slideCont">
            </div>
        </form>
    </div>
</div>
<script src="./../resources/js/survey.js"></script>