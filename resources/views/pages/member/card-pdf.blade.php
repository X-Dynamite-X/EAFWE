{{-- Card PDF Export Template --}}

<!DOCTYPE html>
<html dir="{{ $locale === 'ar' ? 'rtl' : 'ltr' }}" lang="{{ $locale }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('member.pdf.title') }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #fff;
            padding: 40px;
            direction: {{ $locale === 'ar' ? 'rtl' : 'ltr' }};
        }

        .card-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .card {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            border-radius: 24px;
            padding: 50px;
            color: white;
            min-height: 450px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            margin-bottom: 60px;
        }

        .card::before {
            content: '';
            position: absolute;
            top: -100px;
            {{ $locale === 'ar' ? 'left' : 'right' }}: -100px;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            z-index: 1;
        }

        .card-title {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .card-subtitle {
            font-size: 14px;
            opacity: 0.8;
            margin-top: 4px;
        }

        .card-logo {
            font-size: 56px;
        }

        .card-member {
            margin-top: 40px;
            z-index: 1;
        }

        .card-member-label {
            font-size: 13px;
            opacity: 0.8;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .card-member-name {
            font-size: 40px;
            font-weight: 900;
            margin-bottom: 8px;
        }

        .card-member-email {
            font-size: 18px;
            opacity: 0.9;
        }

        .card-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-top: 50px;
            padding-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            z-index: 1;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
        }

        .detail-label {
            font-size: 12px;
            opacity: 0.7;
            margin-bottom: 6px;
            text-transform: uppercase;
        }

        .detail-value {
            font-size: 20px;
            font-weight: 700;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 50px;
            z-index: 1;
        }

        .card-footer-info {
            font-size: 12px;
            opacity: 0.8;
            line-height: 1.6;
        }

        .qr-section {
            text-align: center;
        }

        .qr-code {
            background: white;
            padding: 15px;
            border-radius: 16px;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .qr-code svg {
            width: 140px;
            height: 140px;
            display: block;
        }

        .qr-label {
            color: white;
            font-size: 11px;
            margin-top: 10px;
            font-weight: 600;
            opacity: 0.9;
        }

        .page-break {
            page-break-after: always;
        }

        .info-section {
            padding: 40px;
            background: #f8fafc;
            border-radius: 20px;
            margin-top: 40px;
        }

        .info-section h3 {
            color: #1e293b;
            font-size: 24px;
            margin-bottom: 24px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 12px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .info-item p {
            font-size: 15px;
            color: #475569;
            margin-bottom: 12px;
            line-height: 1.6;
        }

        .info-item strong {
            color: #1e293b;
        }

        .verification-steps {
            margin-top: 32px;
            padding: 24px;
            background: white;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }

        .verification-steps ol {
            margin-{{ $locale === 'ar' ? 'right' : 'left' }}: 24px;
        }

        .verification-steps li {
            font-size: 15px;
            color: #475569;
            margin-bottom: 12px;
        }

        .security-badge {
            display: inline-flex;
            align-items: center;
            background: #ecfdf5;
            color: #059669;
            padding: 8px 20px;
            border-radius: 99px;
            font-size: 14px;
            font-weight: 700;
            margin-top: 20px;
            border: 1px solid #10b981;
        }

        .features-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-top: 24px;
        }

        .feature-item {
            font-size: 14px;
            color: #475569;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .feature-icon {
            color: #10b981;
            font-weight: 900;
        }

        @media print {
            body {
                padding: 0;
            }

            .card-container {
                width: 100%;
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
                    <div class="card-subtitle">{{ __('member.pdf.title') }}</div>
                </div>
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
                <div class="card-footer-info">
                    <div>{{ __('member.card.issued') }}: {{ $membership->approval_date?->format('d/m/Y') }}</div>
                    <div style="font-family: monospace; margin-top: 4px;">
                        VERIFICATION: {{ substr($membership->card_token, 0, 16) }}...
                    </div>
                </div>
                <div class="qr-section">
                    <div class="qr-code">
                        <img src="{{ $qrCodeData }}" alt="QR Code"
                            style="width: 140px; height: 140px; display: block;">
                    </div>
                    <div class="qr-label">{{ __('member.pdf.how_to_verify') }}</div>
                </div>
            </div>
        </div>

        <div class="page-break"></div>

        {{-- Information Page --}}
        <div class="info-section">
            <h3>&#9776; {{ __('member.pdf.info_title') }}</h3>
            <div class="info-grid">
                <div class="info-item">
                    <p><strong>{{ __('member.pdf.full_name') }}:</strong> {{ $user->name }}</p>
                    <p><strong>{{ __('member.pdf.email') }}:</strong> {{ $user->email }}</p>
                    @if ($user->phone)
                        <p><strong>{{ __('member.pdf.phone') }}:</strong> {{ $user->phone }}</p>
                    @endif
                </div>
                <div class="info-item">
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
            </div>

            <div class="verification-steps">
                <h4 style="margin-bottom: 16px; color: #1e293b;">&#128274; {{ __('member.pdf.how_to_verify') }}</h4>
                <p style="margin-bottom: 16px; font-size: 14px;">{{ __('member.pdf.verify_desc') }}</p>
                <ol>
                    <li>{{ __('member.pdf.verify_steps.step1') }}</li>
                    <li>{{ __('member.pdf.verify_steps.step2') }}</li>
                    <li>{{ __('member.pdf.verify_steps.step3') }}</li>
                    <li>{{ __('member.pdf.verify_steps.step4') }}</li>
                </ol>
                <div class="security-badge">
                    &#10003; {{ __('member.pdf.secure_badge') }}
                </div>
            </div>

            <div class="features-list">
                <div class="feature-item"><span class="feature-icon">&#10003;</span>
                    {{ __('member.pdf.features.unique_qr') }}</div>
                <div class="feature-item"><span class="feature-icon">&#10003;</span>
                    {{ __('member.pdf.features.instant_verify') }}</div>
                <div class="feature-item"><span class="feature-icon">&#10003;</span>
                    {{ __('member.pdf.features.secure') }}</div>
                <div class="feature-item"><span class="feature-icon">&#10003;</span>
                    {{ __('member.pdf.features.updatable') }}</div>
            </div>
        </div>
    </div>
</body>

</html>
