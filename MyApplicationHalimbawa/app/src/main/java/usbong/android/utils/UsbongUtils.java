/*
 * Copyright 2012~2022 SYSON, MICHAEL B.
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 *  @company: USBONG
 *  @author: SYSON, MICHAEL B.
 *  @date created: 2012
 *  @date updated: 20220314
 *  @website address: http://www.usbong.ph
 */

package usbong.android.utils;

import android.os.Environment;

import java.io.BufferedInputStream;
import java.io.FileInputStream;
import java.io.File;
import java.io.InputStream;
import java.io.InputStreamReader;

public class UsbongUtils {
    public static String BASE_FILE_PATH = Environment.getExternalStorageDirectory()+"/usbongV2-ANDROID/";

    public static InputStreamReader getFileFromSDCardAsReader(String filePath) //example of file would be decision trees
    {
        try
        {
            InputStreamReader reader = new InputStreamReader(getFileFromSDCardAsInputStream(filePath),"UTF-8");
            return reader;
        }
        catch(Exception e) {
            System.out.println("ERROR in reading FILE.");
            e.printStackTrace();
        }
        return null;
    }

    public static InputStream getFileFromSDCardAsInputStream(String filePath) {
        try
        {
            File file = new File(filePath);
            if(!file.exists())
            {
                System.out.println(">>>>>> File " + filePath + " doesn't exist."); //Creating file.
                return null;
            }

            InputStream in = null;
            try {
                in = new BufferedInputStream(new FileInputStream(file));
            }
            catch(Exception e) {
                e.printStackTrace();
            }

            return in;
        }
        catch(Exception e) {
            System.out.println("ERROR in reading FILE.");
            e.printStackTrace();
        }
        return null;
    }
}