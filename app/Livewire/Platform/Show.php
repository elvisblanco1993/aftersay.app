<?php

namespace App\Livewire\Platform;

use App\Models\Platform;
use BaconQrCode\Renderer\Color\Alpha;
use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Livewire\Component;

class Show extends Component
{
    public Platform $platform;

    public function render()
    {
        return view('livewire.platform.show', [
            'qr' => $this->qr_code,
        ]);
    }

    public function getQrCodeProperty()
    {
        $renderer = new ImageRenderer(
            new RendererStyle(
                size: 200,
                margin: 1,
                fill: Fill::uniformColor(
                    backgroundColor: new Alpha(0, new Rgb(255, 255, 255)),
                    foregroundColor: new Rgb(106, 60, 191)
                )
            ),
            new SvgImageBackEnd
        );

        $writer = new Writer($renderer);

        return $writer->writeString($this->platform->url);
    }
}
