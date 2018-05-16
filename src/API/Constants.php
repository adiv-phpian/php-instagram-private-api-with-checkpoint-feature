<?php

namespace Instagram\API;

class Constants {

    /*
	 * API Base URL.
	 */
    const BASE_URL = "https://i.instagram.com/api";

    /*
     * User Agent for API Requests
     */
    const USER_AGENT = "Instagram 8.0.0 Android (23/6.0.1; 640dpi; 1440x2560; samsung; SM-G935F; hero2lte; samsungexynos8890; en_NZ)";

    /*
	 * Key used to generate JSON Signatures
	 */
    const IG_SIGNATURE_KEY = "9b3b9e55988c954e51477da115c58ae82dcae7ac01c735b4443a3c5923cb593a";

    /*
     * Version of the Signature Key
     */
    const IG_SIGNATURE_KEY_VERSION = "4";

    /*
     * Connection Type
     */
    const IG_CAPABILITIES = "3Q==";

    /*
     * Connection Type
     */
    const IG_CONNECTION_TYPE = "WIFI";

    /*
     * Connection Type
     */
    const ACCEPT_LANGUAGE = "en-NZ";

    /*
     * Connection Type
     */
    const ACCEPT_ENCODING = "gzip, deflate, sdch";

    /*
     * Your Timezone
     */
    const TIMEZONE = "Pacific/Auckland";

    /*
     * Your Timezone Offset
     */
    const TIMEZONE_OFFSET = 43200;

}