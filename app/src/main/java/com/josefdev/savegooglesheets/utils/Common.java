package com.josefdev.savegooglesheets.utils;

import com.josefdev.savegooglesheets.models.GoogleSheetsResponse;
import com.josefdev.savegooglesheets.models.IGoogleSheets;

public class Common {
    public static String BASE_URL = "https://script.google.com/macros/s/AKfycbz_B80xu46wZ0f8KSxSk1X7TnBAXSUIwW0yX_y5VBRgHMN3bQ-cGvqolwx3VO-bM4mJuQ/exec/";
    public static String GOOGLE_SHEET_ID = "158SKnD1DXeXMLNhD-Yt9oGeY9Sm8fkHdB2KMP0_6bb0";
    public static String SHEET_NAME = "personas";

    public static IGoogleSheets iGSGetMethodClient(String baseUrl) {
        return GoogleSheetsResponse.getClientGetMethod(baseUrl)
                .create(IGoogleSheets.class);
    }

}
