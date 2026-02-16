<?php

namespace App\Http\Controllers;

use App\Models\KinderGartenEnroll;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AnaokuluController extends Controller
{
    public function anaokulufileupload(Request $request)
    {

        $enroll = DB::table("kindergarten_enrollments")->where("id", $request->enrollid)->first();

        if (!$enroll) {
            return response()->json([
                'success' => false,
                'message' => 'Başvuru size ait değildir.',
                'errors' => 'Başvuru size ait değildir.'
            ], 422);
        }


        try {
            // Validation kuralları
            $validator = Validator::make($request->all(), [
                'file_1' => 'nullable|file|max:20480|mimes:pdf,jpg,jpeg,png,zip,rar,heic,heif,bmp,dng,tiff,webp', // 20MB max
                'file_2' => 'nullable|file|max:20480|mimes:pdf,jpg,jpeg,png,zip,rar,heic,heif,bmp,dng,tiff,webp',
                'file_3' => 'nullable|file|max:20480|mimes:pdf,jpg,jpeg,png,zip,rar,heic,heif,bmp,dng,tiff,webp',
                'file_4' => 'nullable|file|max:20480|mimes:pdf,jpg,jpeg,png,zip,rar,heic,heif,bmp,dng,tiff,webp',
                'file_5' => 'nullable|file|max:20480|mimes:pdf,jpg,jpeg,png,zip,rar,heic,heif,bmp,dng,tiff,webp',
                'file_6' => 'nullable|file|max:20480|mimes:pdf,jpg,jpeg,png,zip,rar,heic,heif,bmp,dng,tiff,webp',
                'file_7' => 'nullable|file|max:20480|mimes:pdf,jpg,jpeg,png,zip,rar,heic,heif,bmp,dng,tiff,webp',
                'file_8' => 'nullable|file|max:20480|mimes:pdf,jpg,jpeg,png,zip,rar,heic,heif,bmp,dng,tiff,webp',
                'file_9' => 'nullable|file|max:20480|mimes:pdf,jpg,jpeg,png,zip,rar,heic,heif,bmp,dng,tiff,webp',
            ], [
                'file_1.max' => 'Dosya 1 boyutu 10MB dan büyük olamaz.',
                'file_2.max' => 'Dosya 2 boyutu 10MB dan büyük olamaz.',
                'file_3.max' => 'Dosya 3 boyutu 10MB dan büyük olamaz.',
                'file_4.max' => 'Dosya 4 boyutu 10MB dan büyük olamaz.',
                'file_5.max' => 'Dosya 5 boyutu 10MB dan büyük olamaz.',
                'file_6.max' => 'Dosya 6 boyutu 10MB dan büyük olamaz.',
                'file_7.max' => 'Dosya 7 boyutu 10MB dan büyük olamaz.',
                'file_8.max' => 'Dosya 8 boyutu 10MB dan büyük olamaz.',
                'file_9.max' => 'Dosya 9 boyutu 10MB dan büyük olamaz.',
                'file_1.mimes' => 'Dosya 1 için geçersiz dosya türü.',
                'file_2.mimes' => 'Dosya 2 için geçersiz dosya türü.',
                'file_3.mimes' => 'Dosya 3 için geçersiz dosya türü.',
                'file_4.mimes' => 'Dosya 4 için geçersiz dosya türü.',
                'file_5.mimes' => 'Dosya 5 için geçersiz dosya türü.',
                'file_6.mimes' => 'Dosya 6 için geçersiz dosya türü.',
                'file_7.mimes' => 'Dosya 7 için geçersiz dosya türü.',
                'file_8.mimes' => 'Dosya 8 için geçersiz dosya türü.',
                'file_9.mimes' => 'Dosya 9 için geçersiz dosya türü.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Dosya yükleme sırasında hatalar oluştu.',
                    'errors' => $validator->errors()->all(),
                    'detailed_errors' => $validator->errors()
                ], 422);
            }

            // En az bir dosya yüklenmiş mi kontrol et
            if (!$request->hasFile('file_1') && !$request->hasFile('file_2') && !$request->hasFile('file_3') && !$request->hasFile('file_4') && !$request->hasFile('file_5') && !$request->hasFile('file_6') && !$request->hasFile('file_7') && !$request->hasFile('file_8') && !$request->hasFile('file_9')) {
                return response()->json([
                    'success' => false,
                    'message' => 'En az bir dosya seçmelisiniz.'
                ], 400);
            }

            $uploadedFiles = [];

            // Her dosya için yükleme işlemi
            for ($i = 1; $i <= 9; $i++) {
                $fileKey = 'file_' . $i;

                if ($request->hasFile($fileKey)) {
                    $file = $request->file($fileKey);

                    // Dosya bilgileri
                    $originalName = $enroll->id;
                    $extension = $file->getClientOriginalExtension();
                    $mimeType = $file->getMimeType();
                    $size = $file->getSize();

                    // Güvenli dosya adı oluştur
                    $fileName = Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '_' . time() . '_' . Str::random(6) . '.' . $extension;

                    // Dosyayı storage'a kaydet
                    $path = $file->storeAs('/anaokulu/', $fileName, 'uploads');

                    // Yüklenen dosya bilgilerini sakla
                    $uploadedFiles[] = [
                        'field' => $fileKey,
                        'original_name' => $originalName,
                        'stored_name' => $fileName,
                        'path' => $path,
                        'full_path' => Storage::url($path),
                        'size' => $size,
                        'mime_type' => $mimeType,
                        'extension' => $extension
                    ];

                    $anaokulufileinsert = DB::table('kindergarten_documents')->insertGetId([
                        'file_type' => $i,
                        'parent_id' => 1,
                        'student_id' => 1,
                        'enrollment_id' => $enroll->id,
                        'document_url' => $path,
                        'full_path' => Storage::url($path),
                        'extension' => $extension,
                        'size' => $size,
                        'statu' => 0
                    ]);
                }
            }

            // Veritabanına kaydet (isteğe bağlı)
            // $this->saveToDatabase($uploadedFiles);

            KinderGartenEnroll::where('id', $enroll->id)->update(['documents_statu' => 1]);

            return response()->json([
                'success' => true,
                'message' => count($uploadedFiles) . ' dosya başarıyla yüklendi.',
                'files' => $uploadedFiles
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Dosya yüklenirken bir hata oluştuuu: ' . $e->getMessage()
            ], 500);
        }

    }

    public function basvurularim(Request $request)
    {

        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $enrollments = KinderGartenEnroll::where('parent_id', $studentid)->where('deleted_at', '=', null)->get();

        if ($enrollments->count() == 0) {
            return redirect()->route('anaokulu');
        }

        return view('anaokulu/basvurularim', compact( 'enrollments'));

    }

    public function enrollcheck(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $kindergartenstudent = student::where('identity', $request->identity)->first();

        if ($kindergartenstudent != null) {
            if (KinderGartenEnroll::where('student_id', $kindergartenstudent->id)->where('parent_id', $student->id)->where('deleted_at', null)->exists()) {
                return "true";
            } else if(KinderGartenEnroll::where('student_id', $kindergartenstudent->id)->where('deleted_at', null)->exists()){
                return "truedifferent";
            } else {
                return "false";
            }
        } else {
            return "false";
        }

    }
}
