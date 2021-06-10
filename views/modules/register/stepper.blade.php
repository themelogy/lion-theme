<div class="bs-stepper">
    <div class="bs-stepper-header" role="tablist">
        <!-- your steps here -->
        <div class="step {{ $step1 ?? null }}" data-target="#step-1">
            <a href="#" class="step-trigger"  id="logins-part-trigger">
                <span class="bs-stepper-circle">1</span>
                <span class="bs-stepper-label">Başvuru Bilgileri</span>
            </a>
        </div>
        <div class="line"></div>
        <div class="step {{ $step2 ?? null }}" data-target="#step-2">
            <a href="#" class="step-trigger" role="tab" aria-controls="information-part" id="step-2-trigger">
                <span class="bs-stepper-circle">2</span>
                <span class="bs-stepper-label">Teminat Türü</span>
            </a>
        </div>
        <div class="line"></div>
        <div class="step {{ $step3 ?? null }}" data-target="#step-3">
            <a href="#" class="step-trigger" role="tab" aria-controls="information-part" id="step-3-trigger">
                <span class="bs-stepper-circle">3</span>
                <span class="bs-stepper-label">Teminat/Tüketim</span>
            </a>
        </div>
        <div class="line"></div>
        <div class="step {{ $step4 ?? null }}" data-target="#step-4">
            <a href="#" class="step-trigger" role="tab" aria-controls="information-part" id="step-4-trigger">
                <span class="bs-stepper-circle">4</span>
                <span class="bs-stepper-label">Başvuru Belgeleri</span>
            </a>
        </div>
        <div class="line"></div>
        <div class="step {{ $step5 ?? null }}" data-target="#step-5">
            <a href="#" class="step-trigger" role="tab" aria-controls="information-part" id="step-5-trigger">
                <span class="bs-stepper-circle">5</span>
                <span class="bs-stepper-label">Başvuruyu Tamamla</span>
            </a>
        </div>
    </div>
</div>