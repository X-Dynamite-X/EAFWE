{{-- Card PDF Export Template --}}

<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بطاقة العضوية</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f5f5f5;
            padding: 20px;
            direction: rtl;
        }

        .card-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 40px 20px;
        }

        .card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 40px;
            color: white;
            min-height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin-top: -100px;
            margin-right: -100px;
        }

        .card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin-bottom: -100px;
            margin-left: -100px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
        }

        .card-logo {
            font-size: 48px;
        }

        .card-member {
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
        }

        .card-member-label {
            font-size: 12px;
            opacity: 0.8;
            margin-bottom: 5px;
        }

        .card-member-name {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-member-email {
            font-size: 14px;
            opacity: 0.9;
        }

        .card-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
            padding-bottom: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            z-index: 1;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
        }

        .detail-label {
            font-size: 11px;
            opacity: 0.7;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .detail-value {
            font-size: 16px;
            font-weight: 600;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            position: relative;
            z-index: 1;
        }

        .card-footer-left {
            font-size: 11px;
            opacity: 0.8;
        }

        .qr-code {
            text-align: center;
        }

        .qr-code svg {
            width: 120px;
            height: 120px;
            background: white;
            padding: 10px;
            border-radius: 10px;
        }

        .page-break {
            page-break-after: always;
            margin-top: 40px;
        }

        .info-section {
            margin-top: 40px;
            padding: 20px;
            background: #f5f5f5;
            border-radius: 10px;
            page-break-inside: avoid;
        }

        .info-section h3 {
            color: #333;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .info-section p {
            color: #666;
            font-size: 14px;
            margin-bottom: 8px;
            line-height: 1.6;
        }

        .security-badge {
            display: inline-block;
            background: #10b981;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-top: 10px;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .card-container {
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <div class="card-container">
        {{-- Main Card --}}
        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-title">{{ __('member.pdf.card_label') }}</div>
                    <div style="font-size: 12px; opacity: 0.7;">{{ __('member.pdf.title') }}</div>
                </div>
                <div class="card-logo">🎖️</div>
            </div>

            <div class="card-member">
                <div class="card-member-label">{{ __('member.pdf.cardholder') }}</div>
                <div class="card-member-name">{{ $user->name }}</div>
                <div class="card-member-email">{{ $user->email }}</div>
            </div>

            <div class="card-details">
                <div class="detail-item">
                    <div class="detail-label">{{ __('member.pdf.member_id') }}</div>
                    <div class="detail-value">{{ str_pad($membership->user_id, 6, '0', STR_PAD_LEFT) }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">{{ __('member.pdf.membership_type') }}</div>
                    <div class="detail-value">
                        @switch($membership->membership_type)
                            @case('basic')
                                {{ __('member.membership_types.basic') }}
                            @break

                            @case('premium')
                                {{ __('member.membership_types.premium') }}
                            @break

                            @case('enterprise')
                                {{ __('member.membership_types.enterprise') }}
                            @break
                        @endswitch
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">{{ __('member.pdf.country') }}</div>
                    <div class="detail-value">{{ $membership->country }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">{{ __('member.pdf.issue_date') }}</div>
                    <div class="detail-value">{{ $membership->approval_date?->format('d/m/Y') }}</div>
                </div>
            </div>

            <div class="card-footer">
                <div class="card-footer-left">
                    <div>{{ __('member.card.issued') }}: {{ $membership->approval_date?->format('d/m/Y') }}</div>
                    <div style="font-family: monospace; margin-top: 5px; font-size: 9px;">
                        TOKEN: {{ substr($membership->card_token, 0, 20) }}
                    </div>
                </div>
                <div class="qr-code">
                    {!! $qrCodeData !!}
                </div>
            </div>
        </div>

        {{-- Information Pages --}}
        <div class="page-break"></div>

        <div class="info-section">
            <h3>📋 {{ __('member.pdf.info_title') }}</h3>
            <p><strong>{{ __('member.pdf.full_name') }}:</strong> {{ $user->name }}</p>
            <p><strong>{{ __('member.pdf.email') }}:</strong> {{ $user->email }}</p>
            @if ($user->phone)
                <p><strong>{{ __('member.pdf.phone') }}:</strong> {{ $user->phone }}</p>
            @endif
            <p><strong>{{ __('member.pdf.membership_type') }}:</strong>
                @switch($membership->membership_type)
                    @case('basic')
                        {{ __('member.membership_types.basic') }}
                    @break

                    @case('premium')
                        {{ __('member.membership_types.premium') }}
                    @break

                    @case('enterprise')
                        {{ __('member.membership_types.enterprise') }}
                    @break
                @endswitch
            </p>
            @if ($membership->company_name)
                <p><strong>{{ __('member.pdf.company_name') }}:</strong> {{ $membership->company_name }}</p>
            @endif
            <p><strong>{{ __('member.pdf.country') }}:</strong> {{ $membership->country }}</p>
            <p><strong>{{ __('member.pdf.approval_date') }}:</strong>
                {{ $membership->approval_date?->format('d M, Y') }}</p>
        </div>

        <div class="info-section">
            <h3>🔒 {{ __('member.pdf.how_to_verify') }}</h3>
            <p>{{ __('member.pdf.verify_desc') }}</p>
            <ol style="margin-right: 20px; margin-top: 10px;">
                <li style="margin-bottom: 8px;">{{ __('member.pdf.verify_steps.step1') }}</li>
                <li style="margin-bottom: 8px;">{{ __('member.pdf.verify_steps.step2') }}</li>
                <li style="margin-bottom: 8px;">{{ __('member.pdf.verify_steps.step3') }}</li>
                <li style="margin-bottom: 8px;">{{ __('member.pdf.verify_steps.step4') }}</li>
            </ol>
            <p style="margin-top: 15px;"><span class="security-badge">✓ {{ __('member.pdf.secure_badge') }}</span></p>
        </div>

        <div class="info-section">
            <h3>⚡ {{ __('member.pdf.features.title') ?? 'الميزات' }}</h3>
            <p>✓ <strong>{{ __('member.pdf.features.unique_qr') }}</strong></p>
            <p>✓ <strong>{{ __('member.pdf.features.instant_verify') }}</strong></p>
            <p>✓ <strong>{{ __('member.pdf.features.secure') }}</strong></p>
            <p>✓ <strong>{{ __('member.pdf.features.updatable') }}</strong></p>
            <p>✓ <strong>{{ __('member.pdf.features.digital_print') }}</strong></p>
        </div>
    </div>
</body>

</html>
